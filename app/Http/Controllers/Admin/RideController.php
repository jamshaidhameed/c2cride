<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminCancel;
use App\Mail\BookingCancel;
use App\Mail\BookingComplete;
use App\Mail\BookingConfirm;
use App\Mail\BookingRequest;
use App\Mail\BookingUpdate;
use App\Mail\BookingAssigned;
use App\Mail\DriverOnRoute;
use App\Mail\DriverArrived;
use App\Mail\RescheduleRequest;
use App\Models\CarType;
use App\Models\Currency;
use App\Models\Ride;
use App\Models\RideType;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\BecomePartner;
use App\Models\UserActivityLogs;
use App\Models\City2CityRide;
use App\Models\Vendor;
use App\Models\Suppliers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RidesExport;


class RideController extends Controller
{
    public function bookings(Request $request)
    {

        $fields = $request->all();
        $rides = Ride::with('user')->where('is_past', 0);
        if ($request->filled('car_type') || $request->filled('start_date') || $request->filled('payment_method')) {
            $start_date = $request->filled('start_date') ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
            $end_date = $request->filled('end_date') ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

            // Define a method to apply your conditions within a closure to ensure proper grouping.
            $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                if ($request->filled('car_type')) {
                    $query->where('car', $request->input('car_type'));
                }
                if ($request->filled('payment_method')) {
                    $query->where('payment_method', $request->input('payment_method'));
                }
                if (!is_null($start_date) && !is_null($end_date)) {
                    $query->whereBetween('date_time', [$start_date, $end_date]);
                }
            };

            // Apply the filters to each status count, ensuring proper logical grouping.
            $complete_rides = Ride::where('is_past', 0)->where('status', 1)->where($applyFilters)->count();
            $pending_rides = Ride::where('is_past', 0)->where('status', 2)->where($applyFilters)->count();
            $cancel_rides = Ride::where(['is_past' =>  0,'status' => 3])->whereNull('cancel_remarks')->where($applyFilters)->count();
            $user_canceled = Ride::where(['is_past' =>  0,'status' => 3])->whereNotNull('cancel_remarks')->where($applyFilters)->count();
            $confirmed_rides = Ride::where('is_past', 0)->where('status', 4)->where($applyFilters)->count();
            $reschedule_rides = Ride::where('is_past', 0)->whereNotNull('old_date_time')->where($applyFilters)->count();
            $all_rides = Ride::where('is_past', 0)->where($applyFilters)->count();
        } else {

            $complete_rides = Ride::where('is_past', 0)->where('status', 1)->count();

            $pending_rides = Ride::where('is_past', 0)->where('status', 2)->count();
            $cancel_rides = Ride::where(['is_past' =>  0,'status' => 3,'cancel_by' => 'admin'])->count();
            $user_canceled = Ride::where(['is_past' =>  0,'status' => 3,'cancel_by' => 'customer'])->count();
            $confirmed_rides = Ride::where('is_past', 0)->where('status', 4)->count();
            $reschedule_rides = Ride::where('is_past', 0)->whereNotNull('old_date_time')->count();
            $all_rides = Ride::where('is_past', 0)->count();
        } 

        if ($request->filled('currency')) {
            
            $rides = $rides->where('currency', $request['currency']);
        }


        if ($request->filled('payment_method')) {
            $rides = $rides->where('payment_method', $request['payment_method']);
        }
        if ($request->filled('start_date')) {
            $start_date = Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s');
            $end_date = Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s');
            $rides = $rides->whereBetween('date_time', [$start_date, $end_date]);
        }

        if ($request->filled('booking_status')) {
            $rides = $rides->where('status', $request['booking_status']);
        }
        if ($request->filled('car_type')) {

            $rides = $rides->where('car', $request['car_type']);
        }

        if ($request->filled('search')) {

            $rides->where(function ($query) {
                $query->where('booking_code', 'like', '%' . request('search') . '%')->orWhere('source', 'like', '%' . request('search') . '%')->orWhere('destination', 'like', '%' . request('search') . '%')->orWhere('car', 'like', '%' . request('search') . '%');
            });
        }

        $rides = $rides->with('ridetype', 'user', 'coupons')->orderBy('date_time', 'ASC')->paginate(10);
        $rideCounts = Ride::where('is_past', 0)
            ->select('user_id', DB::raw('count(*) as total_rides'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');
        $rideComplete = Ride::where('is_past', 0)->where('status', 1)
            ->select('user_id', DB::raw('count(*) as total_rides'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');
        $rideCancel = Ride::where('is_past', 0)->where('status', 3)
            ->select('user_id', DB::raw('count(*) as total_rides'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');
        foreach ($rides as $ride) {
    if ($ride->user) {
        $userId = $ride->user->id;
        $ride->user->total_rides = $rideCounts[$userId]->total_rides ?? 0;
        $ride->user->completed_rides = $rideComplete[$userId]->total_rides ?? 0;
        $ride->user->canceled_rides = $rideCancel[$userId]->total_rides ?? 0;
    } else {
        // Handle rides with no associated user, if necessary
        $ride->user = (object) [
            'total_rides' => 0,
            'completed_rides' => 0,
            'canceled_rides' => 0,
        ];
    }
}

        $rides_count = Ride::where('is_past', 0)->count();
        $currencies = Currency::get();
        //dd($ride);

        return response()->view('admin.bookings.index', compact('all_rides', 'rides', 'fields', 'rides_count', 'currencies', 'complete_rides', 'cancel_rides', 'pending_rides', 'reschedule_rides', 'confirmed_rides','user_canceled'));
    }






    public function rideAction(Request $request)
    {

        $request->validate([
            'ride_action' => 'required|string',
            'ride_id' => 'required|array',
            'ride_id.*' => 'integer|exists:rides,id',
        ]);

        if ($request->filled('ride_id')) {
            $rideIds = $request->input('ride_id');
            $action = $request->input('ride_action');

            switch ($action) {
                case 'past':
                    
                    Ride::whereIn('id', $rideIds)->update(['is_past' => 1]);
                    
                    break;
                case 'delete':
                    Ride::whereIn('id', $rideIds)->delete();
                    break;
                case 'booking':
                    Ride::whereIn('id', $rideIds)->update(['is_past' => 0]);
                    $rides = Ride::whereIn('id',$rideIds)->get();
                    foreach ($rides as $key => $ride) {
                       
                        if ($ride->status == '3') {
                            
                            Ride::where('id',$ride->id)->update(['status' => '2']);
                        }
                    }
                    break;
            }
        }

        return redirect()->back();
    }

    public function getRideJson(Request $request){

        $ride_ids = $request->ride_ids;

        return response()->json(Ride::whereIn('id',$ride_ids)->with(['vehicle','driver'])->get());
    }

    public function showInvoice(Request $request)
    {
        $rideId = $request->input('ride_id');
        // $ride = Ride::with(['user', 'rideType'])->find($rideId);

        // if (!$ride) {
        //     return redirect()->back()->with('error', 'Ride not found.');
        // }

        // $customer = $ride->user;

        // $data = [
        //     'customer' => [
        //         'name' => $ride->display_name,
        //         'email' => $ride->email,
        //         'phone' => $ride->mobile_number ? $ride->mobile_number : $customer->mobile_number
        //     ],
        //     'ride' => $ride,
        //     'date' => Carbon::now()->format('d/m/Y'),
        //     'formatted_date_time' => Carbon::parse($ride->date_time)->format('D, M d, Y h:i A'),
        //     'formatted_ride_time' => Carbon::parse($ride->ride_time)->format('h:i A'),
        //     'formatted_old_date_time' => $ride->old_date_time ? Carbon::parse($ride->old_date_time)->format('D, M d, Y h:i A') : null,
        //     'logo' => public_path('images/logo.svg'),
        // ];

         // return view('invoice',$data);
    //  $pdf = PDF::loadView('invoice', $data);

      $ride = Ride::where('id',$rideId)->first();

         if (empty($ride)) {
            
            return back()->withErrors(['trackBooking_ref' => 'No Record Found']);
        }

         $user = User::where('email',$ride->email)->first();

         $data = [
            'image_path' => asset('front/images/logo.svg'),
            'ride' => $ride,
            'user' => $user
        ];

        $newFileName = 'invoice_' . $ride->booking_code . '.pdf';

      $pdf = Pdf::loadView('front.invoice.invoice', $data);
//
    return $pdf->download($newFileName);
    }


    public function pastRides(Request $request)
    {

        $fields = $request->all();
        // dd($fields);
        $rides = Ride::with('user')->where('is_past', 1);


        if ($request->filled('payment_method')) {
            $rides = $rides->where('payment_method', $request['payment_method']);
        }
        if ($request->filled('start_date')) {
            $start_date = Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s');
            $end_date = Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s');
            $rides = $rides->whereBetween('date_time', [$start_date, $end_date]);
        }

        if ($request->filled('booking_status')) {
            $rides = $rides->where('status', $request['booking_status']);
        }
        if ($request->filled('car_type')) {

            $rides = $rides->where('car', $request['car_type']);
        }


        if ($request->filled('search')) {
            $rides->where(function ($query) {
                $query->where('id', 'like', '%' . request('search') . '%')->orWhere('source', 'like', '%' . request('search') . '%')->orWhere('destination', 'like', '%' . request('search') . '%')->orWhere('car', 'like', '%' . request('search') . '%');
            });
        }
        $rides = $rides->orderBy('id', 'DESC')->paginate(10);

        $rideCounts = Ride::where('is_past', 0)
            ->select('user_id', DB::raw('count(*) as total_rides'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');
        $rideComplete = Ride::where('is_past', 0)->where('status', 1)
            ->select('user_id', DB::raw('count(*) as total_rides'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');
        $rideCancel = Ride::where('is_past', 0)->where('status', 3)
            ->select('user_id', DB::raw('count(*) as total_rides'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');
        foreach ($rides as $ride) {
            $userId = $ride->user->id;
            $ride->user->total_rides = $rideCounts[$userId]->total_rides ?? 0;
            $ride->user->completed_rides = $rideComplete[$userId]->total_rides ?? 0;
            $ride->user->canceled_rides = $rideCancel[$userId]->total_rides ?? 0;
        }

        $rides_count = Ride::where('is_past', 1)->count();

        if ($request->filled('car_type') || $request->filled('start_date') || $request->filled('payment_method')) {
            $start_date = $request->filled('start_date') ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
            $end_date = $request->filled('end_date') ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

            // Define a method to apply your conditions within a closure to ensure proper grouping.
            $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                if ($request->filled('car_type')) {
                    $query->where('car', $request->input('car_type'));
                }
                if ($request->filled('payment_method')) {
                    $query->where('payment_method', $request->input('payment_method'));
                }
                if (!is_null($start_date) && !is_null($end_date)) {
                    $query->whereBetween('date_time', [$start_date, $end_date]);
                }
            };
            $complete_rides = Ride::where('is_past', 1)->where('status', 1)->where($applyFilters)->count();
            $cancel_rides = Ride::where(['is_past' =>  1,'status' => 3,'cancel_by' => 'admin'])->count();
            $user_canceled = Ride::where(['is_past' =>  1,'status' => 3,'cancel_by' => 'customer'])->count();
            $all_rides = Ride::where('is_past', 1)->where($applyFilters)->count();
        } else {
            $complete_rides = Ride::where('is_past', 1)->where('status', 1)->count();
          $cancel_rides = Ride::where(['is_past' =>  1,'status' => 3,'cancel_by' => 'admin'])->count();
            $user_canceled = Ride::where(['is_past' =>  1,'status' => 3,'cancel_by' => 'customer'])->count();
            $all_rides = Ride::where('is_past', 1)->count();
        }




        return response()->view('admin.pastrides.index', compact('all_rides', 'cancel_rides', 'complete_rides', 'rides', 'fields', 'rides_count','user_canceled'));
    }

    public function changeRideStatus(Request $request)
    {
        
        $driver_id = $request->driver;

        
        
        if (!empty($driver_id) && $driver_id != 0) {

            $driver_info = User::where('id',$driver_id)->first();

            Ride::where('id', $request['ride_id'])->update([
            'status' => $request['status'],
            'driver_id' => $driver_id,
            'updated_by' => Auth::user()->id,
            'vendor_id' => !empty($driver_info) ? $driver_info->company_id : null
        ]);
        }else{
            Ride::where('id', $request['ride_id'])->update([
            'status' => $request['status'], 
        ]);
        }

        if ($request['status'] == 1) {
            Ride::where('id', $request['ride_id'])->update([
                'is_past' => 1
            ]); 
        }

        if (!empty($request->input("remarks")) && $request->input("status") == '3') {
            
            Ride::where('id',$request->input("ride_id"))->update(
                [
                    'status' => $request->input("status"),
                    'cancel_by' => 'admin',
                    'cancel_remarks' => count($request->input("remarks")) ? implode(",",$request->input("remarks")) : ""
                ]
                );
        }
        

        $ride = Ride::find($request['ride_id']);
        $user = User::where('id',$ride->user_id)->first();
        // $ride->user()->first();
        $to_email = $ride->email; 
        // $ride['email'];
        //        $to_email = 'kalesot161@htoal.com';

        if ($request['status'] == '1') {
            $email = new BookingComplete($user, $ride);
            Mail::to($to_email)->send($email);
        } elseif ($request['status'] == '2') {
            $email = new BookingRequest($user, $ride);
            // Mail::to($to_email)->send($email);
        } elseif ($request['status'] == '3') {
            $email = new AdminCancel($user, $ride);
            Mail::to($to_email)->send($email);
        } elseif ($request['status'] == '4') {
            $email = new BookingConfirm($user, $ride);
            Mail::to($to_email)->send($email); 
        } elseif ($request['status'] == '5') {
            $email = new BookingAssigned($user, $ride);
            Mail::to($to_email)->send($email);
        } elseif ($request['status'] == '6') {
           $email = new DriverOnRoute($user, $ride);
            // Mail::to($to_email)->send($email); 
        }
        elseif ($request['status'] == '7'){
            $email = new DriverArrived($user, $ride);
            // Mail::to($to_email)->send($email);
        }
        return response()->json(['status' => 200, 'message' => 'Ride status changed successfully']);
    }

    public  function RidesFilterByStatus(Request $request)
    {
        $status_id = $request->status;
        if ($status_id == 'all') {
            if ($request->car_type || $request->start_date || $request->payment_method) {
                $start_date = $request->start_date ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
                $end_date = $request->end_date ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

                // Define a method to apply your conditions within a closure to ensure proper grouping.
                $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                    if ($request->car_type) {
                        $query->where('car', $request->car_type);
                    }
                    if ($request->payment_method) {
                        $query->where('payment_method', $request->payment_method);
                    }
                    if (!is_null($start_date) && !is_null($end_date)) {
                        $query->whereBetween('date_time', [$start_date, $end_date]);
                    }
                };
                $rides = Ride::where('is_past', 0)->orderBy('id', 'DESC')->where($applyFilters)->paginate(10);
            } else {

                $rides = Ride::where('is_past', 0)->orderBy('id', 'DESC')->paginate(10);
            }
        } elseif ($status_id == 'res') {

            if ($request->car_type || $request->start_date || $request->payment_method) {
                $start_date = $request->start_date ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
                $end_date = $request->end_date ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

                // Define a method to apply your conditions within a closure to ensure proper grouping.
                $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                    if ($request->car_type) {
                        $query->where('car', $request->car_type);
                    }
                    if ($request->payment_method) {
                        $query->where('payment_method', $request->payment_method);
                    }
                    if (!is_null($start_date) && !is_null($end_date)) {
                        $query->whereBetween('date_time', [$start_date, $end_date]);
                    }
                };
                $rides = Ride::where('old_date_time', '!=', null)->where('is_past', 0)->where($applyFilters)->orderBy('id', 'DESC')->paginate(10);
            } else {

                $rides = Ride::where('old_date_time', '!=', null)->where('is_past', 0)->orderBy('id', 'DESC')->paginate(10);
            }
        } else {

            if ($request->car_type || $request->start_date || $request->payment_method) {
                $start_date = $request->start_date ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
                $end_date = $request->end_date ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

                // Define a method to apply your conditions within a closure to ensure proper grouping.
                $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                    if ($request->car_type) {
                        $query->where('car', $request->car_type);
                    }
                    if ($request->payment_method) {
                        $query->where('payment_method', $request->payment_method);
                    }
                    if (!is_null($start_date) && !is_null($end_date)) {
                        $query->whereBetween('date_time', [$start_date, $end_date]);
                    }
                };
                $rides = Ride::where('is_past', 0)->where('status', $status_id)->where($applyFilters)->paginate(10);
            } else {

                $rides = Ride::where('status', $status_id)->where('is_past', 0)->orderBy('id', 'DESC')->paginate(10);
            }
        }

        if ($status_id == 3) {
            
            if ($request->cancel_type == "admin-cancel") {
                
                $rides = Ride::where(['status' =>  $status_id,'is_past'=> 0,'cancel_by' => 'admin'])->orderBy('id', 'DESC')->paginate(10);
            }else{

                $rides = Ride::where(['status' =>  $status_id,'is_past'=> 0,'cancel_by' => 'customer'])->orderBy('id', 'DESC')->paginate(10);
            }
        }

        $response = view('admin.bookings.table', compact('rides'))->render();
        $pagination = view('admin.bookings.pagination', compact('rides'))->render();

        return response()->json(['status' => 200, 'response' => $response, 'pagination' => $pagination]);
    }
    public  function RideFilterSearch(Request $request)
    {
        $status_id = $request->search;
        $rides = Ride::where('is_past', 0);
        $rides->where(function ($query) {
            $query->where('booking_code', 'like', '%' . request('search') . '%')->orWhere('display_name', 'like', '%' . request('search') . '%')->orWhere('email', 'like', '%' . request('search') . '%')->orWhere('source', 'like', '%' . request('search') . '%')->orWhere('destination', 'like', '%' . request('search') . '%')->orWhere('car', 'like', '%' . request('search') . '%')->orWhere('mobile_number', 'like', '%' . request('search') . '%')->orWhere('whatsapp_number', 'like', '%' . request('search') . '%');
        });
        $rides = $rides->with('ridetype', 'user')->orderBy('id', 'DESC')->paginate(10);
        $rideCounts = Ride::where('is_past', 0)
            ->select('user_id', DB::raw('count(*) as total_rides'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id'); // Keying by user_id for easy access

        foreach ($rides as $ride) {
            // Use the user_id from the ride to find the corresponding ride count
            $userId = $ride->user->id;
            // Default to 0 if the user hasn't any rides that match the condition
            $ride->user->total_rides = $rideCounts[$userId]->total_rides ?? 0;
        }
        $response = view('admin.bookings.table', compact('rides'))->render();
        $pagination = view('admin.bookings.pagination', compact('rides'))->render();

        return response()->json(['status' => 200, 'response' => $response, 'pagination' => $pagination]);
    }
    public  function PastRideFilterSearch(Request $request)
    {
        $status_id = $request->search;
        $rides = Ride::where('is_past', 1);
        $rides->where(function ($query) {
            $query->where('booking_code', 'like', '%' . request('search') . '%')->orWhere('display_name', 'like', '%' . request('search') . '%')->orWhere('email', 'like', '%' . request('search') . '%')->orWhere('source', 'like', '%' . request('search') . '%')->orWhere('destination', 'like', '%' . request('search') . '%')->orWhere('car', 'like', '%' . request('search') . '%')->orWhere('mobile_number', 'like', '%' . request('search') . '%')->orWhere('whatsapp_number', 'like', '%' . request('search') . '%');
        });
        $rides = $rides->with('ridetype', 'user')->orderBy('id', 'DESC')->paginate(10);
        $response = view('admin.bookings.table', compact('rides'))->render();
        $pagination = view('admin.bookings.pagination', compact('rides'))->render();

        return response()->json(['status' => 200, 'response' => $response, 'pagination' => $pagination]);
    }

    public function RideFilterBytype(Request $request)
    {
        $type = $request->type;

        if ($type == 'all') {
            $rides = Ride::where('is_past', 0)->orderBy('id', 'DESC')->paginate(10);
            $pagination = view('admin.bookings.pagination', compact('rides'))->render();
        } else {
            // if ($type == 'city') {
            //     // $type_id = RideType::whereIn('type', ['city', 'airport'])->get();
            //     $type_id = RideType::where('type','City Tour')->get();
            //     $rides = Ride::whereIn('ride_type_id', [$type_id->pluck('id')[0], $type_id->pluck('id')[1]])->where('is_past', 0)->orderBy('id', 'DESC')->paginate(10);
            //     $pagination = view('admin.bookings.pagination', compact('rides'))->render();
            // } else {
            //     $type_id = RideType::where('type', $type)->first();
            //     $rides = Ride::where('ride_type_id', $type_id->id)->where('is_past', 0)->orderBy('id', 'DESC')->paginate(10);
            //     $pagination = view('admin.bookings.pagination', compact('rides'))->render();
            // }

            $type_id = RideType::where('type', ucwords($type))->first();
            $rides = Ride::where('ride_type_id', $type_id->id)->where('is_past', 0)->orderBy('id', 'DESC')->paginate(10);
            $pagination = view('admin.bookings.pagination', compact('rides'))->render();
        }
        $response = view('admin.bookings.table', compact('rides'))->render();

        return response()->json(['status' => 200, 'response' => $response, 'pagination' => $pagination]);
    }

    public function PastRideFilterBytype(Request $request)
    {
        $type = $request->type;

        if ($type == 'all') {
            $rides = Ride::where('is_past', 1)->orderBy('id', 'DESC')->paginate(10);
            $pagination = view('admin.bookings.pagination', compact('rides'))->render();
        } else {
            if ($type == 'city') {
                // $type_id = RideType::whereIn('type', ['Rides', 'airport'])->get();
                $type_id = RideType::where('type', "Rides")->first();
                // $rides = Ride::whereIn('ride_type_id', [$type_id[0]])->where('is_past', 1)->orderBy('id', 'DESC')->paginate(10);
                $rides = Ride::where('ride_type_id', $type_id->id)->where('is_past', 1)->orderBy('id', 'DESC')->paginate(10);
                $pagination = view('admin.bookings.pagination', compact('rides'))->render();
            } else {
                $type_id = null;
                if ($type == "tour") {
                    $type_id = RideType::where('type', "City Tour")->first();
                }elseif ($type == "driver") {
                    $type_id = RideType::where('type', "Book Hourly")->first();
                }
                $rides = Ride::where('ride_type_id', $type_id->id)->where('is_past', 1)->orderBy('id', 'DESC')->paginate(10);

                $pagination = view('admin.bookings.pagination', compact('rides'))->render();
            }
        }
        $response = view('admin.pastrides.table', compact('rides'))->render();

        return response()->json(['status' => 200, 'response' => $response, 'pagination' => $pagination]);
    }
    public  function PastRidesFilterByStatus(Request $request)
    {
        $status_id = $request->status;

        if ($status_id == 'all') {
            if ($request->car_type || $request->start_date || $request->payment_method) {
                $start_date = $request->start_date ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
                $end_date = $request->end_date ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

                // Define a method to apply your conditions within a closure to ensure proper grouping.
                $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                    if ($request->car_type) {
                        $query->where('car', $request->car_type);
                    }
                    if ($request->payment_method) {
                        $query->where('payment_method', $request->payment_method);
                    }
                    if (!is_null($start_date) && !is_null($end_date)) {
                        $query->whereBetween('date_time', [$start_date, $end_date]);
                    }
                };
                $rides = Ride::where('is_past', 1)->orderBy('id', 'DESC')->where($applyFilters)->paginate(10);
            } else {
                $rides = Ride::where('is_past', 1)->orderBy('id', 'DESC')->paginate(10);
            }
        } elseif ($status_id == 'res') {
            if ($request->car_type || $request->start_date || $request->payment_method) {
                $start_date = $request->start_date ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
                $end_date = $request->end_date ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

                // Define a method to apply your conditions within a closure to ensure proper grouping.
                $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                    if ($request->car_type) {
                        $query->where('car', $request->car_type);
                    }
                    if ($request->payment_method) {
                        $query->where('payment_method', $request->payment_method);
                    }
                    if (!is_null($start_date) && !is_null($end_date)) {
                        $query->whereBetween('date_time', [$start_date, $end_date]);
                    }
                };
                $rides = Ride::where('old_date_time', '!=', null)->where('is_past', 1)->where($applyFilters)->orderBy('id', 'DESC')->paginate(10);
            } else {
                $rides = Ride::where('old_date_time', '!=', null)->where('is_past', 1)->orderBy('id', 'DESC')->paginate(10);
            }
        } else {

            if ($request->car_type || $request->start_date || $request->payment_method) {
                $start_date = $request->start_date ? Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d H:i:s') : null;
                $end_date = $request->end_date ? Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d H:i:s') : null;

                // Define a method to apply your conditions within a closure to ensure proper grouping.
                $applyFilters = function ($query) use ($request, $start_date, $end_date) {
                    if ($request->car_type) {
                        $query->where('car', $request->car_type);
                    }
                    if ($request->payment_method) {
                        $query->where('payment_method', $request->payment_method);
                    }
                    if (!is_null($start_date) && !is_null($end_date)) {
                        $query->whereBetween('date_time', [$start_date, $end_date]);
                    }
                };
                $rides = Ride::where('is_past', 1)->where('status', $status_id)->where($applyFilters)->paginate(10);
            } else {

                $rides = Ride::where('status', $status_id)->where('is_past', 1)->orderBy('id', 'DESC')->paginate(10);
            }
        }

        if ($status_id == 3) {
            
            if ($request->cancel_type == "admin-cancel") {
                
                $rides = Ride::where(['status' => $status_id,'is_past' =>  1,'cancel_by' => 'admin'])->orderBy('id', 'DESC')->paginate(10);
            }else{
              $rides = Ride::where(['status' => $status_id,'is_past' =>  1,'cancel_by' => 'customer'])->orderBy('id', 'DESC')->paginate(10);  
            }
        }

        $response = view('admin.pastrides.table', compact('rides'))->render();
        $pagination = view('admin.pastrides.pagination', compact('rides'))->render();

        return response()->json(['status' => 200, 'response' => $response, 'pagination' => $pagination]);
    }
    public function rideEdit($id)
    {
        $ride = Ride::where('id', $id)->first();

        $car_type = CarType::get();
        $vehicles = Vehicle::all();

        $response = view('admin.bookings.edit-modal', compact('ride', 'car_type','vehicles'))->render();

        return response()->json(['status' => 200, 'response' => $response, 'ride' => $ride,]);
    }

    public function updateBooking(Request $request)
    {
        $id = $request->id;
        $ride = Ride::where('id', $id)->first();
        $type = $ride->ridetype->type;
        $request->session()->put("form_step_data.1", $request->all());
        $this->validate_step_one($ride, $request, $type);
        $return_distance_duration = $this->calculate_distance($request->source, $request->destination);
        $is_airport_ride = isThisAirportRide($request->source, $request->destination);

        $assigned_amount = $request->assigned_amount;

        // $economy = $this->economy_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        // $comfort = $this->comfort_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        // $business = $this->business_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        // $suv = $this->suv_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        // $ex_suv = $this->ex_suv_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);

        // session()->put('distance_duration', $return_distance_duration);
        // session()->put('economy', $economy);
        // session()->put('comfort', $comfort);
        // session()->put('business', $business);
        // session()->put('suv', $suv);
        // session()->put('ex-suv', $ex_suv);

        $price = 0;
        if ($request->payment_method == 'card') {
            $price = $request->card_price;
        } elseif ($request->payment_method == 'cash') {
            $price = $request->cash_price;
        }
        $edit = Ride::where('id', $id)->first();
        $old_date = date('Y-m-d H:i:s', strtotime($edit->date_time));
        $date = date('Y-m-d H:i:s', strtotime($request->date_time));

        if ($old_date == $date) {
            $data_time_new = $date;
            $old_date_time = null;
        } else {
            $data_time_new = $date;
            $old_date_time = $old_date;
        }

        $ride = Ride::where('id', $id)->update([
            "source" => $request->source,
            "destination" => $request->destination,
            "old_date_time" => $old_date_time,
            "date_time" => $data_time_new,
            "distance" => $request->distance,
            "duration" => $request->duration,
            "adults" => $request->adults,
            "children" => $request->children,
            "luggage" => $request->luggage,
            "child_seats" => $request->child_seats,
            "car" => $request->car,
            "meet_greet" => $request->meet_greet,
            "display_name" => $request->display_name,
            "mobile_number" => $request->mobile_number,
            "whatsapp_number" => $request->whatsapp_number,
            "email" => $request->email,
            "driver_weeks" => $request->driver_weeks,
            "driver_days" => $request->driver_days,
            "photograph" => $request->photograph,
            "price" => $price,
            'tour_city' => $request->tour_city,
            'payment_method' => $request->payment_method,
            'assigned_amount' => $assigned_amount

        ]);
        $editride = Ride::where('id', $id)->first();

        $user = $editride->user()->first();
        if (auth()->user()->email == $editride->email) {
            $email = new BookingUpdate($user, $editride);
            Mail::to($editride['email'])->send($email);
        } else {
            $email = new BookingUpdate($user, $editride);
            Mail::to($editride['email'])->send($email);
            $email = new BookingUpdate($user, $editride);
            Mail::to($user['email'])->send($email);
        }
        return response()->json(['message' => 'Ride Updated Successfully', 'status' => 200]);
    }

    public function calculate_distance($source, $destination)
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'origins' => $source,
            'destinations' => $destination,
            'mode' => 'driving',
            'units' => 'metric',
            'avoidHighways' => false,
            'avoidTolls' => false,
            'key' => 'AIzaSyAjb2hexnJxmJNktoaBX5cdvk12GKdzwMY', // Your Google Maps API Key
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if ($data['status'] === 'OK') {
                foreach ($data['rows'] as $row) {
                    foreach ($row['elements'] as $element) {
                        if ($element['status'] === 'OK') {
                            $distance = $element['distance']['text'] ?? '0 km';
                            $duration = $element['duration']['text'] ?? '0 mins';

                            // Extract numerical value from distance
                            $distanceValue = (float) explode(' ', $distance)[0];

                            return [
                                'distance' => $distanceValue,
                                'duration' => $duration
                            ];
                        }
                    }
                }
            }
        }

        return response()->json(['error' => 'Unable to calculate distance'], 422);
    }

    public function economy_price($ride_type, $way, $distance, $is_airport_ride)
    {
        $economy_price = 0;
        $economy = CarType::where('slug', 'economy')->first();
        if ($ride_type == 'driver') {
            $weeks = isset(session('form_step_data.1')['driver_weeks']) ? session('form_step_data.1')['driver_weeks'] : 0;
            $weekdays = weekintodays($weeks);
            $days = session('form_step_data.1')['driver_days'];
            $total_days = $days + $weekdays;
            $economy_price = 735 * $total_days;
        } else {
            if ($way == '1') {
                if ($is_airport_ride) {
                    if ($distance <= 50) {
                        $economy_price = $economy->fixed_price  + $economy->ariport_additional;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $economy_price = $distance * $economy->above_fifty + $economy->ariport_additional;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $economy_price = $distance * $economy->above_seventy + $economy->ariport_additional;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $economy_price = $distance * $economy->above_hundred + $economy->ariport_additional;
                    } else {
                        $economy_price = $distance * $economy->above_hundred_thirty + $economy->ariport_additional;
                    }
                } else {

                    if ($distance <= 50) {
                        $economy_price = $economy->fixed_price;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $economy_price = $distance * $economy->above_fifty;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $economy_price = $distance * $economy->above_seventy;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $economy_price = $distance * $economy->above_hundred;
                    } else {
                        $economy_price = $distance * $economy->above_hundred_thirty;
                    }
                }
            } elseif ($way == '2') {
                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $economy_price = $economy->fixed_price * 2 + $economy->ariport_additional * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $economy_price = $distance * $economy->above_fifty * 2  + $economy->ariport_additional * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $economy_price = $distance * $economy->above_seventy * 2 + $economy->ariport_additional * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $economy_price = $distance * $economy->above_hundred * 2 + $economy->ariport_additional * 2;
                    } else {
                        $economy_price = $distance * $economy->above_hundred_thirty * 2 + $economy->ariport_additional * 2;
                    }
                } else {

                    if ($distance <= 50) {
                        $economy_price = $economy->fixed_price * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $economy_price = $distance * $economy->above_fifty * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $economy_price = $distance * $economy->above_seventy * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $economy_price = $distance * $economy->above_hundred * 2;
                    } else {
                        $economy_price = $distance * $economy->above_hundred_thirty * 2;
                    }
                }
            }
        }
        $discount_rate = 20 / 100;
        $original_price = $economy_price / (1 - $discount_rate);
        return ['price' => $economy_price, 'ride' => 'economy', 'original_price' => $original_price];
    }

    public function comfort_price($ride_type, $way, $distance, $is_airport_ride)
    {
        $comfort_price = 0;
        $comfort = CarType::where('slug', 'comfort')->first();
        if ($ride_type == 'driver') {
            $weeks = session('form_step_data.1')['driver_weeks'] ? session('form_step_data.1')['driver_weeks'] : 0;
            $days = session('form_step_data.1')['driver_days'];
            $weekdays = weekintodays($weeks);
            $total_days = $weekdays + $days;
            $comfort_price = 845 * $total_days;
        } else {
            if ($way == '1') {
                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $comfort_price = $comfort->fixed_price + $comfort->ariport_additional;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $comfort_price = $distance * $comfort->above_fifty + $comfort->ariport_additional;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $comfort_price = $distance * $comfort->above_seventy + $comfort->ariport_additional;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $comfort_price = $distance * $comfort->above_hundred + $comfort->ariport_additional;
                    } else {
                        $comfort_price = $distance * $comfort->above_hundred_thirty + $comfort->ariport_additional;
                    }
                } else {

                    if ($distance <= 50) {
                        $comfort_price = $comfort->fixed_price;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $comfort_price = $distance * $comfort->above_fifty;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $comfort_price = $distance * $comfort->above_seventy;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $comfort_price = $distance * $comfort->above_hundred;
                    } else {
                        $comfort_price = $distance * $comfort->above_hundred_thirty;
                    }
                }
            } elseif ($way == '2') {
                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $comfort_price = $comfort->fixed_price * 2 + $comfort->ariport_additional * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $comfort_price = $distance * $comfort->above_fifty * 2 + $comfort->ariport_additional * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $comfort_price = $distance * $comfort->above_seventy * 2 + $comfort->ariport_additional * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $comfort_price = $distance * $comfort->above_hundred * 2 + $comfort->ariport_additional * 2;
                    } else {
                        $comfort_price = $distance * $comfort->above_hundred_thirty * 2 + $comfort->ariport_additional * 2;
                    }
                } else {

                    if ($distance <= 50) {
                        $comfort_price = $comfort->fixed_price * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $comfort_price = $distance * $comfort->above_fifty * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $comfort_price = $distance * $comfort->above_seventy * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $comfort_price = $distance * $comfort->above_hundred * 2;
                    } else {
                        $comfort_price = $distance * $comfort->above_hundred_thirty * 2;
                    }
                }
            }
        }
        $discount_rate = 20 / 100;
        $original_price = $comfort_price / (1 - $discount_rate);
        return ['price' => $comfort_price, 'ride' => 'comfort', 'original_price' => $original_price];
    }
    public function business_price($ride_type, $way, $distance, $is_airport_ride)
    {
        $business_price = 0;
        $business = CarType::where('slug', 'business')->first();
        if ($ride_type == 'driver') {
            $weeks = session('form_step_data.1')['driver_weeks'] ? session('form_step_data.1')['driver_weeks'] : 0;
            $days = session('form_step_data.1')['driver_days'];
            $weekdays = weekintodays($weeks);

            $total_days = $weekdays + $days;
            $business_price = 1150 * $total_days;
        } else {

            if ($way == '1') {
                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $business_price = $business->fixed_price + $business->ariport_additional;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $business_price = $distance * $business->above_fifty + $business->ariport_additional;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $business_price = $distance * $business->above_seventy + $business->ariport_additional;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $business_price = $distance * $business->above_hundred + $business->ariport_additional;
                    } else {
                        $business_price = $distance * $business->above_hundred_thirty + $business->ariport_additional;
                    }
                } else {
                    if ($distance <= 50) {
                        $business_price = $business->fixed_price;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $business_price = $distance * $business->above_fifty;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $business_price = $distance * $business->above_seventy;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $business_price = $distance * $business->above_hundred;
                    } else {
                        $business_price = $distance * $business->above_hundred_thirty;
                    }
                }
            } elseif ($way == '2') {
                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $business_price = $business->fixed_price * 2 + $business->ariport_additional * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $business_price = $distance * $business->above_fifty * 2 + $business->ariport_additional * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $business_price = $distance * $business->above_seventy * 2 + $business->ariport_additional * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $business_price = $distance * $business->above_hundred * 2 + $business->ariport_additional * 2;
                    } else {
                        $business_price = $distance * $business->above_hundred_thirty * 2 + $business->ariport_additional * 2;
                    }
                } else {

                    if ($distance <= 50) {
                        $business_price = $business->fixed_price * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $business_price = $distance * $business->above_fifty * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $business_price = $distance * $business->above_seventy * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $business_price = $distance * $business->above_hundred * 2;
                    } else {
                        $business_price = $distance * $business->above_hundred_thirty * 2;
                    }
                }
            }
        }
        $discount_rate = 20 / 100;
        $original_price = $business_price / (1 - $discount_rate);
        return ['price' => $business_price, 'ride' => 'business', 'original_price' => $original_price];
    }
    public function suv_price($ride_type, $way, $distance, $is_airport_ride)
    {

        $suv_price = 0;
        $suv = CarType::where('slug', 'suv')->first();
        if ($ride_type == 'driver') {
            $weeks = session('form_step_data.1')['driver_weeks'] ? session('form_step_data.1')['driver_weeks'] : 0;
            $days = session('form_step_data.1')['driver_days'];
            $weekdays = weekintodays($weeks);
            $total_days = $weekdays + $days;
            $suv_price = 950  * $total_days;
        } else {
            if ($way == '1') {
                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $suv_price = $suv->fixed_price + $suv->ariport_additional;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $suv_price = $distance * $suv->above_fifty + $suv->ariport_additional;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $suv_price = $distance * $suv->above_seventy + $suv->ariport_additional;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $suv_price = $distance * $suv->above_hundred + $suv->ariport_additional;
                    } else {
                        $suv_price = $distance * $suv->above_hundred_thirty + $suv->ariport_additional;
                    }
                } else {

                    if ($distance <= 50) {
                        $suv_price = $suv->fixed_price;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $suv_price = $distance * $suv->above_fifty;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $suv_price = $distance * $suv->above_seventy;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $suv_price = $distance * $suv->above_hundred;
                    } else {
                        $suv_price = $distance * $suv->above_hundred_thirty;
                    }
                }
            } elseif ($way == '2') {

                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $suv_price = $suv->fixed_price * 2 + $suv->ariport_additional * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $suv_price = $distance * $suv->above_fifty * 2 + $suv->ariport_additional * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $suv_price = $distance * $suv->above_seventy * 2 + $suv->ariport_additional * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $suv_price = $distance * $suv->above_hundred * 2 + $suv->ariport_additional * 2;
                    } else {
                        $suv_price = $distance * $suv->above_hundred_thirty * 2 + $suv->ariport_additional * 2;
                    }
                } else {

                    if ($distance <= 50) {
                        $suv_price = $suv->fixed_price * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $suv_price = $distance * $suv->above_fifty * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $suv_price = $distance * $suv->above_seventy * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $suv_price = $distance * $suv->above_hundred * 2;
                    } else {
                        $suv_price = $distance * $suv->above_hundred_thirty * 2;
                    }
                }
            }
        }
        $discount_rate = 20 / 100;
        $original_price = $suv_price / (1 - $discount_rate);
        return ['price' => $suv_price, 'ride' => 'suv', 'original_price' => $original_price];
    }
    public function ex_suv_price($ride_type, $way, $distance, $is_airport_ride)
    {

        $ex_suv_price = 0;
        $ex_suv = CarType::where('slug', 'ex-suv')->first();
        if ($ride_type == 'driver') {
            $weeks = session('form_step_data.1')['driver_weeks'] ? session('form_step_data.1')['driver_weeks'] : 0;
            $days = session('form_step_data.1')['driver_days'];
            $weekdays = weekintodays($weeks);
            $total_days = $weekdays + $days;
            $ex_suv_price = 1450 * $total_days;
        } else {
            if ($way == '1') {
                if ($is_airport_ride) {
                    if ($distance <= 50) {
                        $ex_suv_price = $ex_suv->fixed_price + $ex_suv->ariport_additional;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $ex_suv_price = $distance * $ex_suv->above_fifty + $ex_suv->ariport_additional;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $ex_suv_price = $distance * $ex_suv->above_seventy + $ex_suv->ariport_additional;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $ex_suv_price = $distance * $ex_suv->above_hundred + $ex_suv->ariport_additional;
                    } else {
                        $ex_suv_price = $distance * $ex_suv->above_hundred_thirty + $ex_suv->ariport_additional;
                    }
                } else {
                    if ($distance <= 50) {
                        $ex_suv_price = $ex_suv->fixed_price;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $ex_suv_price = $distance * $ex_suv->above_fifty;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $ex_suv_price = $distance * $ex_suv->above_seventy;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $ex_suv_price = $distance * $ex_suv->above_hundred;
                    } else {
                        $ex_suv_price = $distance * $ex_suv->above_hundred_thirty;
                    }
                }
            } elseif ($way == '2') {
                if ($is_airport_ride) {

                    if ($distance <= 50) {
                        $ex_suv_price = $ex_suv->fixed_price * 2 + $ex_suv->ariport_additional * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $ex_suv_price = $distance * $ex_suv->above_fifty * 2 + $ex_suv->ariport_additional * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $ex_suv_price = $distance * $ex_suv->above_seventy * 2 + $ex_suv->ariport_additional * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $ex_suv_price = $distance * $ex_suv->above_hundred * 2 + $ex_suv->ariport_additional * 2;
                    } else {
                        $ex_suv_price = $distance * $ex_suv->above_hundred_thirty * 2 + $ex_suv->ariport_additional * 2;
                    }
                } else {

                    if ($distance <= 50) {
                        $ex_suv_price = $ex_suv->fixed_price * 2;
                    } elseif ($distance > 50 && $distance <= 70) {
                        $ex_suv_price = $distance * $ex_suv->above_fifty * 2;
                    } elseif ($distance > 70 && $distance <= 100) {
                        $ex_suv_price = $distance * $ex_suv->above_seventy * 2;
                    } elseif ($distance > 100 && $distance <= 130) {
                        $ex_suv_price = $distance * $ex_suv->above_hundred * 2;
                    } else {
                        $ex_suv_price = $distance * $ex_suv->above_hundred_thirty * 2;
                    }
                }
            }
        }
        $discount_rate = 20 / 100;
        $original_price = $ex_suv_price / (1 - $discount_rate);
        return ['price' => $ex_suv_price, 'ride' => 'ex-suv', 'original_price' => $original_price];
    }

    public  function validate_step_one($ride, $request, $type)
    {
        if ($type == 'Rides') {

            
                $validated = $request->validate([
                    'source' => 'required',
                    'destination' => 'required',
                    'car' => 'required',
                    'distance' => 'required',
                    'duration' => 'required',


                ]);    
            
        } elseif ($type == 'Book Hourly') {
            $validated = $request->validate([
                'source' => 'required',
                'car' => 'required',


            ]);
        } elseif ($type == 'City Tour') {
            $validated = $request->validate([
                'source' => 'required',
                'car' => 'required',
                'tour_city' => 'required',


            ]);
        } 
        return 1;
    }

    public function getDistance(Request $request)
    {
        $id = $request->id;
        if ($request->driver_weeks >= '0' || $request->driver_weeks >= 0) {
            session()->put('form_step_data.1.driver_weeks', $request->driver_weeks);
        }
        if ($request->driver_days >= '0' || $request->driver_days >= 0) {
            session()->put('form_step_data.1.driver_days', $request->driver_days);
        }
        $ride = Ride::where('id', $id)->first();
        $type = $ride->ridetype->type;

        $return_distance_duration = $this->calculate_distance($request->source, $request->destination);

        $is_airport_ride = isThisAirportRide($request->source, $request->destination);
        $economy = $this->economy_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        $comfort = $this->comfort_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        $business = $this->business_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        $suv = $this->suv_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);
        $ex_suv = $this->ex_suv_price($type, $ride->way, $return_distance_duration['distance'], $is_airport_ride);

        session()->put('distance_duration', $return_distance_duration);
        session()->put('economy', $economy);
        session()->put('comfort', $comfort);
        session()->put('business', $business);
        session()->put('suv', $suv);
        session()->put('ex-suv', $ex_suv);
        $price = 0;
        if ($ride->way == '2') {
            $price = session($request->cartype)['price'] / 2;
        } else {
            $price = session($request->cartype)['price'];
        }
        $chlid_seat = 0;
        if ($request->child_seat > 0 && ($type == 'city' || $type == 'airport')) {
            $chlid_seat = 50;
        }

        $total = $price + $chlid_seat;
        return response()->json(['status' => 200, 'distance' => $return_distance_duration, 'price' => $total, 'ride' => $ride]);
    }

    public function daily_ride_report(Request $request){

        $fields = $request->all();

        
        $c2crides = Ride::query();

        if ($request->filled('from_date') && $request->filled("to_date")) {
            
            $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
            $to_date = Carbon::parse($request->to_date)->format('Y-m-d');

            $c2crides = $c2crides->whereBetween('date_time',[$from_date,$to_date]);
        }else{
            $c2crides = $c2crides->where('ride_date',Carbon::now()->toDateString());
        }

        $c2crides = $c2crides->orderBy('date_time','ASC')->get();

        $city2cityrides = City2CityRide::query();

        if ($request->filled('from_date') && $request->filled("to_date")) {

            $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
            $to_date = Carbon::parse($request->to_date)->format('Y-m-d');

            $city2cityrides = $city2cityrides->whereBetween('date_time',[$from_date,$to_date]);
        }else if($request->filled('booking_number')){

            $city2cityrides = $city2cityrides->where('booking_code',$request->booking_number);
        }else{

            $city2cityrides = $city2cityrides->whereDate('date_time',Carbon::today());
        }

        $city2cityrides = $city2cityrides->orderBy('date_time','ASC')->get();

        $result_arr = null;

        $first_array = $c2crides->map(function($item){
            $item->ride_from = "c2cride";
            return $item;
        });

        $second_array = $city2cityrides->map(function($item) {
            $item->ride_from = "city2city";

            return $item;
        });

        $merged = $first_array->merge($second_array);

        $rides =  $merged->sortBy("date_time");

        // return $rides;

        $vendors = Suppliers::where('status',1)->get();
        return view('admin.rides.daily',compact('rides','vendors'));
    }

    public function rides_apply_filters(Request $request){

        $request->validate(
            [
                'from_date' => 'nullable',
                'to_date' => 'nullable',
                'booking_number' => 'nullable',
                'type' => 'nullable',
                'value' => 'nullable'
            ]
            );

         $fields = $request->all();

        
        $c2crides = Ride::query();

        if ($request->filled('from_date') && $request->filled("to_date")) {
            
            // $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
            // $to_date = Carbon::parse($request->to_date)->format('Y-m-d');
            // $c2crides = $c2crides->whereBetween('date_time',[$from_date,$to_date]);
            $from_date = Carbon::parse($request->from_date)->startOfDay();
            $to_date = Carbon::parse($request->to_date)->endOfDay();
            $c2crides = $c2crides->whereDate('date_time', '>=', $from_date)->whereDate('date_time', '<=', $to_date);
        }else if($request->filled("booking_number")){
            
            $c2crides = $c2crides->where('booking_code',$request->input("booking_number"));
        }
        else{
            $c2crides = $c2crides->where('ride_date',Carbon::now()->toDateString());
        }

        $c2crides = $c2crides->orderBy('date_time','ASC')->get();

        $city2cityrides = City2CityRide::query();

        if ($request->filled('from_date') && $request->filled("to_date")) {

            // $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
            // $to_date = Carbon::parse($request->to_date)->format('Y-m-d');

            // $city2cityrides = $city2cityrides->whereBetween('date_time',[$from_date,$to_date]);
             $from_date = Carbon::parse($request->from_date)->startOfDay();
            $to_date = Carbon::parse($request->to_date)->endOfDay();
            $city2cityrides = $city2cityrides->whereDate('date_time', '>=', $from_date)->whereDate('date_time', '<=', $to_date);
            
        }else if($request->filled('booking_number')){

            $city2cityrides = $city2cityrides->where('booking_code',$request->booking_number);
        }else{

            $city2cityrides = $city2cityrides->whereDate('date_time',Carbon::today());
        }

        $city2cityrides = $city2cityrides->orderBy('date_time','ASC')->get();

        $result_arr = null;

        $first_array = $c2crides->map(function($item){
            $item->ride_from = "c2cride";
            return $item;
        });

        $second_array = $city2cityrides->map(function($item) {
            $item->ride_from = "city2city";

            return $item;
        });

        $merged = $first_array->merge($second_array);

        $rides = $merged->sortBy("date_time");

        if ($request->filled('type') && $request->filled('value')) {
            
            $rides = $rides->where($request->input('type'),$request->input('value'));
        }

        if ($request->filled("supplier_filter")) {
            
            $rides = $rides->where('supplier_id',$request->input('supplier_filter'));
        }

        $type = $request->type;
        $value = $request->value;
        // return response()->json($rides);

        $response = view('admin.rides.table', compact('rides','type','value'))->render();

        return response()->json(['status' => 200, 'response' => $response]);
        
    }
    
     public function ride_exports(Request $request){


           $fields = $request->all();

        
        $c2crides = Ride::query();

        if ($request->filled('from_date') && $request->filled("to_date")) {
            
            // $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
            // $to_date = Carbon::parse($request->to_date)->format('Y-m-d');

            // $c2crides = $c2crides->whereBetween('date_time',[$from_date,$to_date]);
            $from_date = Carbon::parse($request->from_date)->startOfDay();
            $to_date = Carbon::parse($request->to_date)->endOfDay();
            $c2crides = $c2crides->whereDate('date_time', '>=', $from_date)->whereDate('date_time', '<=', $to_date);
        }else if($request->filled("booking_number")){
            
            $c2crides = $c2crides->where('booking_code',$request->input("booking_number"));
        }else{
            $c2crides = $c2crides->where('ride_date',Carbon::now()->toDateString());
        }

        $c2crides = $c2crides->orderBy('date_time','ASC')->get();

        $city2cityrides = City2CityRide::query();

        if ($request->filled('from_date') && $request->filled("to_date")) {

            // $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
            // $to_date = Carbon::parse($request->to_date)->format('Y-m-d');

            // $city2cityrides = $city2cityrides->whereBetween('date_time',[$from_date,$to_date]);
            $from_date = Carbon::parse($request->from_date)->startOfDay();
            $to_date = Carbon::parse($request->to_date)->endOfDay();
            $city2cityrides = $city2cityrides->whereDate('date_time', '>=', $from_date)->whereDate('date_time', '<=', $to_date);
        }else if($request->filled('booking_number')){

            $city2cityrides = $city2cityrides->where('booking_code',$request->booking_number);
        }else{

            $city2cityrides = $city2cityrides->whereDate('date_time',Carbon::today());
        }

        $city2cityrides = $city2cityrides->orderBy('date_time','ASC')->get();

        $result_arr = null;

        $first_array = $c2crides->map(function($item){
            $item->ride_from = "c2cride";
            return $item;
        });

        $second_array = $city2cityrides->map(function($item) {
            $item->ride_from = "city2city";

            return $item;
        });

        $merged = $first_array->merge($second_array);

        $rides = $merged->sortBy("date_time");

        if ($request->filled('type') && $request->filled('value')) {
            
            $rides = $rides->where($request->input('type'),$request->input('value'));
        }

        if ($request->filled("supplier_filter")) {
            
            $rides = $rides->where('supplier_id',$request->input('supplier_filter'));
        }

        $file_name = 'rides_export_' . now()->format('Ymd_His') . '.xlsx';
        
        return Excel::download(new RidesExport($rides), $file_name);
        
     } 
 
     public function update_ride_informations(Request $request){

        $request->validate(
            [
                'ride_id' => 'required',
                'tve_booking_number' => 'nullable',
                'payment_link_confirmation' => 'required',
                'serial_number' => 'nullable',
                'source_report' => 'nullable',
                'ride_extra_details' => 'nullable',
                'ride_from' => 'required',
                'supplier_id' => $request->source_report === 'b2b' ? 'required' : 'nullable',
            ]
            );

            if ($request->input("ride_from") == "c2cride") {
                
            
            $activity = [];

            $ride_info = Ride::where('id',$request->ride_id)->first();

            if (!empty($ride_info)) {
                
                if ($ride_info->tve_booking_number != $request->tve_booking_number) {
                   $activity ['tve_booking_number']=  $request->tve_booking_number; 
                }
                if ($ride_info->payment_link_confirmation != $request->payment_link_confirmation) {
                    
                    $activity ['payment_link_confirmation']= $request->payment_link_confirmation;
                }

                if ($ride_info->source_report != $request->source_report) {
                   $activity ['source_report']=$request->source_report;
                }

                if ($ride_info->remarks_by_c2c_team != $request->remarks_by_c2c_team) {
                   $activity ['remarks_by_c2c_team']= $request->remarks_by_c2c_team; 
                }

                if ($ride_info->ride_extra_details != $request->ride_extra_details) {
                   $activity ['ride_extra_details']= $request->ride_extra_details; 
                }
                if (!empty($request->vendor_id) && $ride_info->vendor_id != $request->vendor_id) {

                    $vendor = Suppliers::where('id',$request->vendor_id)->first();
                    
                    $activity['supplier'] = !empty($vendor) ? $vendor->name : $request->vendor_id;
                }
                if ($ride_info->stripe_transaction_number != $request->stripe_transaction_number) {
                    
                    $activity['stripe_transaction_number'] = $request->stripe_transaction_number;
                }
            }

            $encoded_json = json_encode($activity);

            $decoded_json = json_decode($encoded_json,true);

            // foreach ($decoded_json as $key => $value) {
                
            //     echo $key." : ".$value."<br>";
            // }
            

        Ride::where('id',$request->ride_id)->update(
            [
                'tve_booking_number' => $request->tve_booking_number,
                'payment_link_confirmation' =>  $request->payment_link_confirmation,
                'fine_amount' =>  $request->fine_amount,
                'source_report' =>  $request->source_report,
                'remarks_by_c2c_team' => $request->remarks_by_c2c_team,
                'ride_extra_details' =>  $request->ride_extra_details,
                'supplier_id' => $request->supplier_id,
                'stripe_transaction_number' => $request->stripe_transaction_number
            ]
            );

        if (count($activity) > 0) {
            
            UserActivityLogs::create(
                [
                    'ride_id' => $request->ride_id,
                    'user_id' => Auth::user()->id,
                    'ip_address' => $request->ip(),
                    'activity' => $encoded_json
                ]
                );
        }

    }else{

        DB::connection('mysql1')->table('rides')->where('id',$request->ride_id)->update(
            [
                'fine_amount' => $request->fine_amount,
                'tve_booking_number' => $request->tve_booking_number,
                'payment_link_confirmation' => $request->payment_link_confirmation,
                'source_report' => $request->source_report,
                'remarks_by_c2c_team' => $request->remarks_by_c2c_team,
                'ride_extra_details' => $request->ride_extra_details,
                'stripe_transaction_number' => $request->stripe_transaction_number
            ]
            );
    }

        session()->flash('success','Ride Informaiton Updated Successfully');

        return redirect()->route('admin.daily.rides.report');
     }
     public function activityLogs($ride_id){


        $ride = Ride::where('id',$ride_id)->first();

        if (empty($ride)) {
            
            abort(404);
        }
        $activities = UserActivityLogs::where('ride_id',$ride_id)->with(['ride','user'])->get();

        return view('admin.rides.log-list',compact('activities','ride'));
     }
}
