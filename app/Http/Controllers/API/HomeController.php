<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Coupons;
use App\Models\Vehicle;
use App\Models\CarType;
use App\Models\RidePricing;
use App\Models\User;
use App\Models\Ride;
use App\Models\CarImages;
use App\Mail\BookingRequest;
use App\Mail\AdminRequest;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class HomeController extends Controller
{
    
    public function all_active_coupons(){
        
        $coupons = Coupons::where(['active' =>  true,'show_on_front' => 1])->where('valid_until', '>=', Carbon::today())->with('ride_type')->get();

        return response()->json($coupons);
    }
    public function cars_list(){

        $cars_list = Vehicle::with('image_list')->get();

        return response()->json($cars_list);
    }
    public function cars_with_price(Request $request){

        $ride_type_id = $request->ride_type_id;
        $distance = $request->distance;
        $duration = $request->duration;
        $is_airport = $request->isAirport;
        $cars_arr = [];

        $vehicles = Vehicle::all();

        $discounted_price = 0;
        $return_amount = 0;
        $return_discount = 0;

        foreach($vehicles as $vehicle){

            $images = CarImages::where('vehicle_id',$vehicle->id)->get();
            $car_image_arr = [];

            foreach($images as $img){

                $car_image_arr[] = [
                    'image_path' => public_path()."/front/images/".$img->image_path,
                    'description' => $img->description
                ];
            }

            if ($request->ride_type_id == 1) {
                    
                    $car_pricing = CarType::where('slug',$vehicle->slug)->first();

                    if (!empty($car_pricing)) {
                        
                        $car_price = rides_pricing($car_pricing,$distance,$is_airport);
                    }
                }elseif ($request->ride_type_id == 2) {
                    
                    $pricing_details = RidePricing::where(['car_id' => $vehicle->id,'ride_type_id' => $request->ride_type_id])->first();

                    if (empty($pricing_details)) {
                        
                        $car_price = 0;
                    }else{

                        $car_pricing = hourly_pricing($pricing_details,$vehicle->id,$duration);

                        if (!empty($car_pricing) && count($car_pricing) > 0) {
                            
                            $car_price = $car_pricing["ride_price"];
                        }
                    }

                    

                }elseif ($request->ride_type_id == 3) {
                    
                    $pricing_details = RidePricing::where(['car_id' => $vehicle->id,'ride_type_id' => $request->ride_type_id])->first();

                    if (!empty($pricing_details)) {
                        
                        $tour_price = citytour_pricing($pricing_details,$duration);
                        $car_price = !empty($tour_price) ? $tour_price : 0;
                    }
                }

                if ($vehicle->discount > 0 && $vehicle->apply_discount == 1) {
                    
                    $discount = (float) $vehicle->discount * $car_price / 100;
                    $discounted_price = $car_price - $discount;
                }else{
                    
                    $discounted_price = $car_price;
                }

                if ($request->ride_type_id == 1 && $request->has('way') && (float) $request->input('way') == 2) {
                    
                    $return_discount = round($discounted_price * 10 / 100,2);
                    $return_amount = $discounted_price - $return_discount;
                    $discounted_price += $return_amount;

                    $car_price += $return_amount;

                }

                $cars_arr [] = [
                    "id" => $vehicle->id,
                    'title' => $vehicle->title,
                    'passengers' => $vehicle->passengers,
                    'suitcases' => $vehicle->suitcases,
                    'free_waiting_time' => $vehicle->free_waiting_time,
                    'porter_service' => $vehicle->porter_service,
                    'discount' => $vehicle->discount,
                    'apply_discount' => $vehicle->apply_discount,
                    'car_price' => round($car_price,2),
                    'discounted_price' => round($discounted_price,2),
                    'return_amount' => $return_amount,
                    'return_discount' => $return_discount,
                    'car_images' => $car_image_arr
                ];
        }

        return response()->json($cars_arr);
    }

    //Validate Ride Post 

    public function validate_ride_post(Request $request)
    {
        $basicValidator = Validator::make($request->all(), [
            'ride_type_id' => 'required|integer|in:1,2,3,4,5',
        ], [
            'ride_type_id.required' => 'Please select a ride type.',
            'ride_type_id.integer' => 'Ride type ID must be a number.',
            'ride_type_id.in' => 'Invalid ride type selected.'
        ]);

        if ($basicValidator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $basicValidator->errors()
            ], 422);
        }

        // Step 2: Dynamic rules based on ride_type_id
        $rules = [
            'pickup_location' => 'required|string|max:255',
            'ride_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->lt(Carbon::today())) {
                        $fail('Ride date must be today or a future date.');
                    }
                },
            ],
            'ride_time' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    try {
                        $rideDate = Carbon::parse($request->input('ride_date'));
                        $rideTime = Carbon::createFromFormat('h:i A', $value);

                        if ($rideDate->isToday()) {
                            $rideDateTime = Carbon::createFromFormat('Y-m-d h:i A', $rideDate->toDateString() . ' ' . $value);
                            if ($rideDateTime->lt(Carbon::now())) {
                                $fail('Ride time must not be in the past.');
                            }
                        }
                    } catch (\Exception $e) {
                        $fail('Invalid ride time format.');
                    }
                },
            ],
            'price' => 'required|numeric',
        ];

        if($request->ride_type_id == 1 ){

            $rules['dropoff_location'] = 'required';
            $rules['distance'] = 'required';
            $rules["way"] = "required|integer|in:1,2";
        }

        if ($request->ride_type_id == 2 || $request->ride_type_id == 3) {
            $rules['duration'] = 'required';
        }

        if ($request->ride_type_id == 3 || $request->ride_type_id == 5) {
            if ($request->has('selected_city')) {
                $rules['selected_city'] = 'required';
            } elseif ($request->has('selected_airport')) {
                $rules['selected_airport'] = 'required';
            }
        }

        $messages = [
            'pickup_location.required' => 'Pickup location is required.',
            'pickup_location.string' => 'Pickup location must be a valid string.',
            'dropoff_location.required' => 'Pickup location is required.',
            'dropoff_location.string' => 'Pickup location must be a valid string.',
            'distance' => 'Distance is required',
            "way.required" => "Way is Required",
            'ride_date.required' => 'Ride date is required.',
            'ride_date.date' => 'Ride date must be a valid date.',
            'ride_time.required' => 'Ride time is required.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'duration.required' => 'Duration is required for this ride type.',
            'selected_city.required' => 'City selection is required.',
            'selected_airport.required' => 'Airport selection is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        return true;
    }

    //Stripe Secret for Stripe Payment
    public function stripe_secret(Request $request){

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = $request->amount * 100; // Convert to cents (e.g. $10 = 1000)
        $currency = 'usd';

        $paymentIntent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => $currency,
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);

    }

    public function store_ride_info(Request $request)
    {
        
        $basicValidator = Validator::make($request->all(), [
            'ride_type_id' => 'required|integer|in:1,2,3,4,5'
        ], [
            'ride_type_id.required' => 'Please select a ride type.',
            'ride_type_id.integer' => 'Ride type ID must be a number.',
            'ride_type_id.in' => 'Invalid ride type selected.',
        ]
      );

      if ($basicValidator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $basicValidator->errors()
            ], 422);
        }

        if ($basicValidator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $basicValidator->errors()
            ], 422);
        }

        $validationResult = $this->validate_ride_post($request);

        if ($validationResult !== true) {
            return $validationResult;
        }

        $user = User::where('id',$request->user_id)->first();

        $ride_amount = (float) $request->price - ((float) $request->return_amount + (float) $request->children_seat_amount + $request->tip_amount);
        $dateString = $request->input("ride_date")." ".$request->input("ride_time");
        $date = Carbon::createFromFormat('Y-m-d h:i A', $dateString);

        $car_info = Vehicle::where('id',$request->car_id)->first();

        $peyment_method = $request->payment_method;

        $booking_code = generateBookingNumber($request->pickup_location, $request->dropoff_location, !empty( $car_info) ?  $car_info->title : '', $request->input("ride_type_id"), $request->way);

        $way = $request->way;


        $ride_data = [
            'user_id' => $user->id, 
            'parent_id' => null,
            'source' => $request->pickup_location,
            'destination' => $request->dropoff_location,
            'ride_type_id' => $request->ride_type_id,
            'way' =>  $request->way,
            'adults' => $request->adults,
            'children' => $request->input("children"),
            'luggage' => $request->input("infants"),
            'child_seats' => $request->input("child_seats"),
            'date_time' =>  $date->format('Y-m-d H:i:s'),
            'ride_date' => date('Y-m-d', strtotime($request->input("ride_date"))),
            'ride_time' => date('H:i:s', strtotime($request->input("ride_time"))),
            'car' => !empty($car_info) ? $car_info->title : '',
            'car_id' => !empty($car_info) ? $car_info->id : null,
            'payment_method' => $peyment_method,
            'price' => round($ride_amount,2),
            'flight_number' => $request->input("flight_detail"),
            'duration' => $request->input("duration"),
            'meet_greet' => $request->input("meet_greet"),
            'whatsapp_number' => !empty($user->watsapp) ? $user->watsapp : '',
            'mobile_number' => !empty($user->mobile_number) ? $user->mobile_number : '',
            'display_name' => !empty($user->name) ? $user->name : '',
            'email' => !empty($user->email) ? $user->email : '',
            'distance' => $request->input("distance"),
            'status' => $peyment_method == 'card' ? '1' : '2',
            'currency_id' => 1,
            'booking_code' => $booking_code,
            'return_date' => (float) $way != 1 && !empty($request->input("return_date")) ? date('Y-m-d', strtotime($request->input("return_date"))) : null,
            'return_time' => (float) $way != 1 && !empty($request->input("return_time")) ? date('H:i:s', strtotime($request->input("return_time"))) : null,
            'tip_amount' => $request->input("tip_amount"),
            'discount_amount' => $request->input("discount_amount"),
            'photography_amount' => $request->input("photography_amount"),
            'photograph' => $request->input("photography"),
            'children_seat_amount' => $request->input("children_seat_amount"),
            'note' => $request->input("note"),
            'extra_charges' => $request->input("extra_charges"),
            'tour_city' => $request->input("tour_city"),
            'return_discount' => 10,
            'return_discount_amount' => $request->input("return_discount_amount"),
            'return_ride_amount' => $request->input("return_amount"),
            'discount_amount' => 0

        ];

        $ride = Ride::create($ride_data);

        if ($way == 2) {
            
            $total_amount = round((float) $request->input("return_amount") + (float)$request->input("children_seat_amount") + (float) $request->input("tip_amount"),2);

            $dateString =$request->input("return_date")." ".$request->input("return_time");
            $date = Carbon::createFromFormat('Y-m-d h:i A', $dateString);

            $booking_code = generateBookingNumber($request->input("dropoff_location"), $request->input("pickup_location"), !empty( $car_info) ?  $car_info->title : '', $request->input("ride_type_id"), $request->input("way"));

            $return_ride = Ride::create([
            'user_id' => $user->id,
            'parent_id' => $ride->id,
            'source' => $request->input("pickup_location"),
            'destination' => $request->input("dropoff_location"),
            'ride_type_id' => $request->input("ride_type_id"),
            'way' =>  $request->input("way"),
            'adults' => $request->input("adults"),
            'children' => $request->input("children"),
            'luggage' => $request->input("infants"),
            'child_seats' => $request->input("child_seats"),
            'date_time' => $date->format('Y-m-d H:i:s'),
            'ride_date' => $date->format('Y-m-d'),
            'ride_time' => $date->format('H:i:s'),
            'car' => !empty($car_info) ? $car_info->title : '',
            'car_id' => !empty($car_info) ? $car_info->id : null,
            'payment_method' => $peyment_method,
            'price' => $total_amount,
            'flight_number' => $request->input("flight_detail"),
            'duration' => $request->input('duration'),
            'meet_greet' => $request->input("meet_greet"),
            'whatsapp_number' => $user->watsapp,
            'mobile_number' => $user->mobile_number,
            'display_name' => $user->name,
            'email' => $user->email,
            'distance' => $request->input("distance"),
            'status' => 2,
            'currency_id' => 1,
            'booking_code' => $booking_code,
            'return_date' => !empty($request->input("return_date")) ? date('Y-m-d', strtotime($request->input("return_date"))) : null,
            'return_time' => !empty($request->input("return_time")) ? date('H:i:s', strtotime($request->input("return_time"))) : null,
            'return_discount_amount' => 0,
            'return_discount' => 0,
            'children_seat_amount' => $request->input("children_seat_amount"),
            'return_ride_amount' => $request->input("return_amount"),
            'tip_amount' => $request->input("tip_amount"),
            'discount_amount' => 0
            ]);

            $ride->return_time = $return_ride->date_time;
            $ride->return_booking_code = $return_ride->booking_code; 

        }

        $email = new BookingRequest($user, $ride);
        Mail::to($ride->email)->send($email);

        $admins = User::where('role_id', 1)->get();

        foreach ($admins as $admin) {
            $email = new AdminRequest($admin, $ride);
            Mail::to($admin['email'])->send($email);
        }

        return response()->json([
            'success' => true,
            'message' => 'Ride created successfully',
            'ride' => $ride
        ], 201);
    }

    //Get Rides 

    public function customer_rides(Request $request){

        $basicValidator = Validator::make($request->all(), [
            'user_id' => 'required',
            'rides' => 'required'
        ], [
            'user_id.required' => 'Please Provide User ID',
            'rides.required' => 'Please specify the Filter ie All Rides,PastRides,Upcomming Rides'
        ]
      );


        if ($basicValidator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $basicValidator->errors()
            ], 422);
        }

        $rides = [];

        if ($request->input("rides") == "all") {
            
            $rides = Ride::where("user_id",$request->input("user_id"))->get();
        }elseif ($request->input("rides") == "upcomming") {
            
            $rides = Ride::where(["user_id" => $request->input("user_id"),'is_past' => 0])->get();

        }else{

            $rides = Ride::where(["user_id" => $request->input("user_id"),'is_past' => 1])->get();
        }

        foreach ($rides as $key => $value) {
            
            if ($value->status == '1') {
                
                $value->status = 'Completed';
            }elseif ($value->status == '2') {
                $value->status = 'Pending';

            }elseif ($value->status == '3') {
                $value->status = 'Cancelled';

            }elseif ($value->status == '4') {
                $value->status = 'Confirmed';

            }elseif ($value->status == '5') {
                $value->status = 'Assigned';

            }elseif ($value->status == '6') {
                $value->status = 'Driver enroute';

            }elseif ($value->status == '7') {
                $value->status = 'Driver at Location';

            }elseif ($value->status == '8') {
                $value->status = 'En route to Drop off';

            }elseif ($value->status == '9') {
                $value->status = 'Ride Start';

            }elseif ($value->status == '10') {
                $value->status = 'Ride End';

            }
        }

        return response()->json(['status' => 200,'data' => $rides]);
    }

    public function driver_review_save(Request $request){

        $basicValidator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'driver_id' => 'required',
            'ride_id' => 'required',
            'rating' => 'required|numeric',
            'comment' => 'nullable|string|max:255'
        ], [
            'customer_id.required' => 'Customer ID',
            'driver_id.required' => 'Driver id is required',
            'ride_id.required' => 'Ride id is required',
            'rating.required' => 'Please Enter Rating' 
        ]
      );


        if ($basicValidator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $basicValidator->errors()
            ], 422);
        }

        $review = DriverReviews::create(
            [
                'driver_id' => $request->input("driver_id"),
                'ride_id' => $request->input("ride_id"),
                'customer_id' => $request->input("customer_id"),
                'rating' => $request->input("rating"),
                'comment' => $request->input("comment")
            ]
            );

        return response()->json(['status' => 200,'review' => $review]);
    }
}
