<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Vehicle;
use App\Models\CarType;
use App\Models\RidePricing;
use App\Models\RideType;
use App\Models\Role;
use App\Models\User;
use App\Models\BecomePartner;
use App\Models\Coupons;
use App\Models\CouponUser;
use App\Models\Ride;
use App\Models\Vendor;
use App\Models\Suppliers;
use App\Models\CarImages;
use App\Models\BecomePartnerFiles;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TravelAgencies;
use App\Exports\PartnerExport;
use App\Exports\EarningExport;

class HomeController extends Controller
{
    public function car_index(){

        $cars = Vehicle::with('image_list')->paginate(50);

      return view('admin.cars.index',compact('cars'));
    }
    public function create_car(){

        return view('admin.cars.create');
    }
    public function car_store(Request $request){

        try {
            
            $validatedData = $request->validate([
            'title' => 'required|string',
            'short_descriptions' => 'nullable|string',
            'passengers' => 'required',
            'free_waiting_time' => 'nullable',
            'discount' => 'nullable',
            'type' => 'required',
            'suitcases' => 'required',
            'porter_service' => 'required',
            'apply_discount' => 'nullable',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'descriptions.*' => 'required|string|max:255',
            'status' => 'required|in:0,1'
        ]);

            //Saving Car Images with Description

            

           $car = Vehicle::create(
            [
                'title' => $request->title,
                'type' => $request->type,
                'slug' => Str::slug($request->title),
                'passengers' => $request->passengers,
                'suitcases' => $request->suitcases,
                'free_waiting_time' => $request->free_waiting_time,
                'porter_service' => $request->porter_service,
                'discount' => $request->discount,
                'apply_discount' => $request->apply_discount,
                'images' =>  '',
                'short_descriptions' => $request->short_descriptions,
                'status' => $request->status	
            ]
            );

            if (!empty($request->images) && count($request->images) > 0 && !empty($request->descriptions) && count($request->descriptions) > 0) {
                
                foreach ($request->images as $key => $image) {
                    
                    if (!empty($car) && !empty($request->descriptions[$key])) {
                        
                        $new_name = rand().'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('front/images'),$new_name);

                        CarImages::create(
                            [
                                'vehicle_id' => $car->id,
                                'description' => $request->descriptions[$key],
                                'image_path' => $new_name
                            ]
                            );
                    }
                }
            }

            // return response()->json(['success' => true, 'message' => 'Car Details Updated Successfully']);

             session()->flash('success','New Car Added Successfully');
             return redirect()->route('admin.car.index');

        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }

    }
    public function car_show($id){
      
      return response()->json(Vehicle::find($id));
    }
    
    public function car_image_delete($id){

        $image = CarImages::where('id',$id)->first();
        if (!empty($image)) {
            
            if(File::exists(public_path('front/images/').$image->image_path)) {
               File::delete(public_path('front/images/').$image->image_path);
            } 

            CarImages::where('id',$id)->delete();
        }
        
       return response()->json(['success' => true,'message' => 'image deleted successfully']);
    }
    public function edit_car($id){
        
        $car = Vehicle::where('id',$id)->with('image_list')->first();
        return view('admin.cars.create',compact('car'));
    }
    public function car_update(Request $request , string $id){
        // return $request->all();

        try {

            $validatedData = $request->validate([
            'title' => 'required|string',
            'short_descriptions' => 'nullable|string',
            'passengers' => 'required',
            'free_waiting_time' => 'nullable',
            'discount' => 'nullable',
            'type' => 'required',
            'suitcases' => 'required',
            'porter_service' => 'required',
            'apply_discount' => 'nullable',
            'status' => 'required|in:0,1'
        ]);

           $car = Vehicle::where('id',$id)->first();

           Vehicle::where('id',$id)->update(
            [
                'title' => $request->title,
                'type' => $request->type,
                'passengers' => $request->passengers,
                'suitcases' => $request->suitcases,
                'free_waiting_time' => $request->free_waiting_time,
                'porter_service' => $request->porter_service,
                'discount' => $request->discount,
                'apply_discount' => $request->apply_discount,
                'images' => '',
                'short_descriptions' => $request->short_descriptions,
                'status' => $request->status	
            ]
            );

            if (!empty($request->images) && count($request->images) > 0 && !empty($request->descriptions) && count($request->descriptions) > 0) {
                
                foreach ($request->images as $key => $image) {
                    
                    if (!empty($car) && !empty($request->descriptions[$key])) {
                        
                        $new_name = rand().'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('front/images'),$new_name);

                        CarImages::create(
                            [
                                'vehicle_id' => $id,
                                'description' => $request->descriptions[$key],
                                'image_path' => $new_name
                            ]
                            );
                    }
                }
            }

            // return response()->json(['success' => true, 'message' => 'Car Details Updated Successfully']);
             session()->flash('success','Car Detail Updated Successfully');
             return redirect()->route('admin.car.index');
            
        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }
    }
    public function car_delete($id){

        $car = Vehicle::find($id);
        $car_images = CarImages::where('vehicle_id',$id)->get();

        if (count($car_images) > 0) {
            
            
            //Deleting Old Images

            foreach ($car_images as $old_img) {
                
                if(File::exists(public_path('front/images/').$old_img->image_path)) {
                    File::delete(public_path('front/images/').$old_img->image_path);
                }   
            }
        }

        CarImages::where('vehicle_id',$id)->delete();
        $car->delete();

        return redirect()->route('admin.car.index');
    }
 
    public function car_pricing(){

        $car_types = CarType::with('car')->get();

        $hourly_ride_type = RideType::where('type','Book Hourly')->first();

        $hourly_bookings = RidePricing::where('ride_type_id',$hourly_ride_type->id)->with('car')->get();

        $citytour_ride_type = RideType::where('type','City Tour')->first();

        $citytour_ride_type_bookings = RidePricing::where('ride_type_id',$citytour_ride_type->id)->with('car')->get();

        // return $hourly_bookings;

        return view('admin.cars.pricing',compact('car_types','hourly_bookings','hourly_ride_type','citytour_ride_type','citytour_ride_type_bookings'));
    }
    public function car_pricing_store(Request $request){
        try {

            $validatedData = $request->validate([
            'car' => 'required|string',
            'base_price' => 'required',
            'above_fifty' => 'required',
            'above_seventy' => 'required',
            'above_hundred' => 'required',
            'above_hundred_thirty' => 'required',
            'ariport_additional' => 'required',
        ]);

           CarType::where('slug',$request->car)->delete();

           $car_info = Vehicle::where('slug',$request->car)->first();

           CarType::create(
            [
                'car_type' => $car_info->title, 
                'slug' => $car_info->slug, 
                'fixed_price' => $request->base_price, 
                'above_twenty' => $request->above_twenty,
                'above_thirty' => $request->above_thirty,
                'above_fifty' => $request->above_fifty, 
                'above_seventy' => $request->above_seventy,
                'above_hundred' => $request->above_hundred,
                'above_hundred_thirty' => $request->above_hundred_thirty,
                'ariport_additional' => $request->ariport_additional
            ]
            );

            return response()->json(['success' => true, 'message' => 'Car Details Updated Successfully']);

            // return redirect()->route('admin.car.pricing');
            
        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }
    }
    public function car_pricing_get($id){

        return response()->json(CarType::find($id));
    }
    public function car_pricing_update(Request $request,string $id){

        try {

            $validatedData = $request->validate([
            'car' => 'required|string',
            'base_price' => 'required',
            'above_fifty' => 'required',
            'above_seventy' => 'required',
            'above_hundred' => 'required',
            'above_hundred_thirty' => 'required',
            'ariport_additional' => 'required',
        ]);

           $car_info = Vehicle::where('slug',$request->car)->first();

           CarType::where('id',$id)->update(
            [
                'car_type' => $car_info->title, 
                'slug' => $car_info->slug, 
                'fixed_price' => $request->base_price,  
                'above_twenty' => $request->above_twenty,                
                'above_thirty' => $request->above_thirty,
                'above_fifty' => $request->above_fifty, 
                'above_seventy' => $request->above_seventy,
                'above_hundred' => $request->above_hundred,
                'above_hundred_thirty' => $request->above_hundred_thirty,
                'ariport_additional' => $request->ariport_additional
            ]
            );

            return response()->json(['success' => true, 'message' => 'Car Details Updated Successfully']);

            // return redirect()->route('admin.car.pricing');
            
        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }
    }
    public function car_pricing_delete($id){

        CarType::where('id',$id)->delete();

        return redirect()->route('admin.car.pricing');
    }

    // Hourly Booking CURD
    public function hourly_booking_store(Request $request){
        // return $request->all();

        try {

            $validatedData = $request->validate([
            'car' => 'required',
            'km' => 'required',
            'increment' => 'required',
            'hourly_price' => 'required',
            'ride_type_id' => 'required',
        ]);


           RidePricing::where(['ride_type_id' => $request->ride_type_id,'car_id' => $request->car])->delete();

           RidePricing::create(
            [
                'car_id' => $request->car,
                'ride_type_id' =>$request->ride_type_id,
                'km' => $request->km,
                'increment' => $request->increment,
                'hourly_price' => $request->hourly_price,
                'airport_extra' => $request->airport_extra
            ]
            );

            return response()->json(['success' => true, 'message' => 'Hourly Pricing Updated']);

            // return redirect()->route('admin.car.pricing');
            
        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }

    }
    public function hourly_booking_get($id){
        
        return response()->json(RidePricing::find($id));
    }
    public function hourly_booking_update(Request $request,string $id){

        // return $request->all();

        try {

            $validatedData = $request->validate([
            'car' => 'required',
            'km' => 'required',
            'increment' => 'required',
            'hourly_price' => 'required',
            'ride_type_id' => 'required',
        ]);


          $ride_info =  RidePricing::find($id);

          if (empty($ride_info)) {
            
            return response()->json(['success' => false,'message' => 'Sorry no Record Found']);
          }
          
        
                $ride_info->car_id = $request->car;
                $ride_info->ride_type_id = $request->ride_type_id;
                $ride_info->km = $request->km;
                $ride_info->increment = $request->increment;
                $ride_info->hourly_price = $request->hourly_price;
                $ride_info->airport_extra =  $request->airport_extra;

                $ride_info->save();
            

            return response()->json(['success' => true, 'message' => 'Hourly Pricing Updated']);

            // return redirect()->route('admin.car.pricing');
            
        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }
    }
    public function hourly_booking_delete($id){

        RidePricing::where('id',$id)->delete();

        return redirect()->route('admin.car.pricing');
    } 
    // City Tour CURD

    public function city_tour_store(Request $request){
        try {

            $validatedData = $request->validate([
            'car' => 'required',
            'ride_type_id' => 'required',
            'five_hour_price' => 'required',
            'ten_hour_price' => 'required',
        ]);

           RidePricing::where(['car_id' => $request->car,'ride_type_id' => $request->ride_type_id])->delete();


           RidePricing::create(
            [
                'car_id' => $request->car,
                'ride_type_id' => $request->ride_type_id,
                'five_hour_price' => $request->five_hour_price,
                'ten_hour_price' => $request->ten_hour_price,
            ]
            );

            return response()->json(['success' => true, 'message' => 'City Tour Pricing Updated Successfully']);

            // return redirect()->route('admin.car.pricing');
            
        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }
    }
    public function city_tour_get($id){
        return response()->json(RidePricing::find($id));
    }
    public function city_tour_update(Request $request,string $id){
         try {

            $validatedData = $request->validate([
            'car' => 'required',
            'ride_type_id' => 'required',
            'five_hour_price' => 'required',
            'ten_hour_price' => 'required',
        ]);


           RidePricing::where('id',$id)->update(
            [
                'car_id' => $request->car,
                'ride_type_id' => $request->ride_type_id,
                'five_hour_price' => $request->five_hour_price,
                'ten_hour_price' => $request->ten_hour_price,
            ]
            );

            return response()->json(['success' => true, 'message' => 'City Tour Pricing Updated Successfully']);

            // return redirect()->route('admin.car.pricing');
            
        } catch (ValidationException $e) {
           
            return response()->json([
            'success' => false,
            'errors' => $e->errors()
            ]);
        }
    }
    public function city_tour_delete($id){

         RidePricing::where('id',$id)->delete();

        return redirect()->route('admin.car.pricing');
    }

    public function drivers_list(){

        $driver_role = Role::where('name','Driver')->first();

        $drivers_list = [];

        if (!empty($driver_role)) {
            
            $drivers_list = User::where('role_id',$driver_role->id)->get();
        }

        return view('admin.driver.index',compact('drivers_list'));
    }
 
    public function become_partner_list(){

        $partner_list = BecomePartner::orderBy('id','desc')->paginate(10);

    return view('admin.partner.index',compact('partner_list'));
    }
    

    public function coupons_list(){

        $copouns_list = Coupons::orderBy('id','desc')->with('ride_type')->get();

        return view('admin.copoun.index',compact('copouns_list'));
    }
    public function coupons_store(Request $request){

        $request->validate(
            [
                'code' => 'required',
                'discount_percentage' => 'nullable',
                'valid_until' => 'required',
                'discount_amount' => 'nullable',
                'valid_from' => 'nullable',
                'ride_type_id' => 'required'
            ]
            );

            $exist = Coupons::where('code',$request->code)->get();

            if (count($exist) > 0) {
                
                return back()->withErrors('copoun code is already exist');
            }

        Coupons::create(
            [
                'code' => $request->code,
                'discount_amount' => $request->discount_amount,
                'discount_percentage' => $request->discount_percentage,
                'valid_from' => date_format(date_create($request->valid_from),'Y-m-d H:i:s'),
                'valid_until' => date_format(date_create($request->valid_until),'Y-m-d H:i:s'),
                'ride_type_id' => $request->ride_type_id,
                'show_at_front' => $request->show_at_front
            ]
            );

        session()->flash('success','Copoun Store successfully');
        return redirect()->route('admin.coupon.list');
    }
    public function update_coupon(Request $request,string $id){

        $request->validate(
            [
                'code' => 'required',
                'discount_percentage' => 'nullable',
                'valid_until' => 'required',
                'discount_amount' => 'nullable',
                'valid_from' => 'nullable',
                'ride_type_id' => 'required'
            ]
            );

            Coupons::where('id',$id)->update(
                [
                    'code' => $request->code,
                    'discount_amount' => $request->discount_amount,
                    'discount_percentage' => $request->discount_percentage,
                    'valid_from' => date_format(date_create($request->valid_from),'Y-m-d H:i:s'),
                    'valid_until' => date_format(date_create($request->valid_until),'Y-m-d H:i:s'),
                    'ride_type_id' => $request->ride_type_id,
                    'show_at_front' => $request->show_at_front
                ]
                );

        session()->flash('success','Copoun Updated successfully');
        return redirect()->route('admin.coupon.list');
    }
    public function coupons_delete($id){

        Coupons::where('id', $id)->delete();

        session()->flash('success','Copoun Deleted successfully');
        return redirect()->route('admin.coupon.list');
    }

    public function copoun_users(){

        // $copoun_users = CouponUser::orderBy('ride_id','DESC')->with('ride','user')->paginate(10);

        $copoun_users = DB::table('coupon_users')->join('rides','coupon_users.ride_id','=','rides.id')->join('coupons','coupon_users.coupons_id','=','coupons.id')->join('users','coupon_users.user_id','=','users.id','left')->orderBy('rides.date_time','desc')->select('coupons.code','rides.booking_code','rides.ride_type_id','rides.created_at as booking_date','rides.date_time','users.name')->paginate(10);

        return view('admin.copoun.user_list',compact('copoun_users'));
    }

    //Driver Earning

    public function earning_list(Request $request){

        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $today      = Carbon::now()->toDateString();

        $drivers_list = User::where('role_id', 3)->orderBy('name', 'asc')->get();
        $vendors      = Vendor::where('status', 1)->get();
        $suppliers    = Suppliers::where('status', 1)->get();

        $driver_id     = $request->driver_id;
        $company_filter = $request->company_name;

        // ✅ Fix: Always use date strings for filtering
        if (!empty($request->from_date) && !empty($request->to_date)) {
            $start_date = Carbon::parse($request->from_date)->toDateString();
            $today      = Carbon::parse($request->to_date)->toDateString();
        }

        $rides = Ride::query();

        if (!empty($driver_id)) {
            $rides->where('driver_id', $driver_id);
        } else {
            $rides->whereNotNull("driver_id");
        }
        $status_filter = "";
        if (!empty($request->status_filter)) {
            $rides->where('status', $request->status_filter);
            $status_filter = $request->status_filter;
        } else {
            $rides->where('status', 1);
        }

        if (!empty($company_filter)) {
            $user_ids = User::where(['role_id' => 3, 'company_name' => $company_filter])
                            ->pluck('id')
                            ->toArray();
            $rides->whereIn('driver_id', $user_ids);
        }

        if (!empty($request->payment_type)) {
            $rides->where('payment_method', $request->payment_type);
        }

        if (!empty($request->vendor_id)) {
            $rides->where('vendor_id', $request->vendor_id);
        } elseif (!empty($request->supplier_id)) {
            $rides->where('supplier_id', $request->supplier_id);
        }

        $rides = $rides->whereDate("date_time", '>=', $start_date)
                    ->whereDate("date_time", '<=', $today)
                    ->select(
                        'driver_id',
                        DB::raw("SUM(assigned_amount) as assigned_amount"),
                        DB::raw('COUNT(id) as total_rides'),
                        DB::raw('SUM(price) as total_amount'),
                        DB::raw('MAX(id) AS last_ride_id')
                    )
                    ->whereNotNull('driver_id')
                    ->groupBy('driver_id')
                    ->orderByDesc('last_ride_id') 
                    ->with('driver', 'vendor', 'supplier')
                    ->get();

        $payment_filter = $request->payment_type;
        $vendor_id = $request->vendor_id;
        $vendor_filter = $vendor_id;
        $supplier_filter = $request->supplier_id;
        return view('admin.earning.index',compact('start_date','today','rides','drivers_list','driver_id','vendors','suppliers','company_filter','status_filter','payment_filter','vendor_id','vendor_filter','supplier_filter'));
    }
    public function export_earning(Request $request){

        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $today = Carbon::now()->toDateString();

        $drivers_list = User::where('role_id',3)->orderBy('name','asc')->get();
        // $company_names = User::where('role_id',3)->select('company_name')->orderBy('company_name','asc')->distinct()->get();

        $vendors = Vendor::where('status',1)->get();
        $suppliers = Suppliers::where('status',1)->get();

        $driver_id = $request->driver_id;
        $company_filter = $request->company_name;

        if (!empty($request->from_date) && !empty($request->to_date)) {

           $start_date = Carbon::parse($request->from_date)->format('Y-m-d');
           $today = Carbon::parse($request->to_date)->format('Y-m-d');

        }else{

            $start_date = Carbon::now()->startOfMonth()->toDateString();
            $today = Carbon::now()->toDateString();
        } 

        $rides = Ride::query();

        if (!empty($driver_id)) {

            $rides->where(['driver_id' => $driver_id]);
        }else{
            $rides->whereNotNull("driver_id");
        }

        if (!empty($request->status_filter)) {
            
            $rides->where('status',$request->status_filter);
        }else{

             $rides->where('status',1);
        }

        if (!empty($company_filter)) {
            
            $users_id = User::where(['role_id' => 3,'company_name' => $company_filter])->select('id')->get();
            $user_ids = [];

            foreach ($users_id as $key => $value) {
                
                array_push($user_ids,$value->id);
            }

          $rides->whereIn('driver_id',$user_ids);
        }

        $payment_filter = "";

        if (!empty($request->payment_type)) {
            
            $rides->where('payment_method',$request->payment_type);

            $payment_filter = $request->payment_type;
        }

        $vendor_id ="";

        $filter = null;

        if (!empty($request->vendor_id)) {
            
            $rides = $rides->where('vendor_id',$request->vendor_id);

            $filter = "vendor";

        }elseif (!empty($request->supplier_id)) {
            
            $rides = $rides->where('supplier_id',$request->supplier_id);
        }

       $rides =  $rides->whereDate("date_time", '>=', $start_date)
                    ->whereDate("date_time", '<=', $today)->orderBy('date_time','asc')->with('driver','vendor','supplier')->get();

       $file_name = 'earning_export_' . now()->format('Ymd_His') . '.xlsx';

       return Excel::download(new EarningExport($rides, $filter), $file_name);


    }

    public function driver_rides($driver_id,$start_date,$end_date,$status){

        $driver_info = User::where('id',$driver_id)->first();

        $start_date = Carbon::parse($start_date);
        $today = Carbon::parse($end_date);


        $rides = Ride::where(['driver_id' => $driver_id,'status' => $status])->whereBetween("ride_date",[$start_date,$today])->with(['vehicle'])->orderBy('id','desc')->get();



        $payment_methods = Ride::where(['driver_id' => $driver_id,'status' => $status])->whereBetween("ride_date",[$start_date,$today])->select('payment_method')->distinct()->get();


        return view('admin.earning.detail',compact('driver_info','start_date','today','rides','status','payment_methods'));


    }

    public function driver_rides_filter(Request $request){

        
        $request->validate(
            [
                'payment_filter' => 'required'
            ]
            );
        

        $driver_info = User::where('id',$request->driver_id)->first();
        $driver_id = $request->driver_id;
        $method = $request->payment_filter;

        $start_date = Carbon::parse($request->start_date);
        $today = Carbon::parse($request->end_date);
        $status = $request->status;


        $rides = Ride::where(['driver_id' => $driver_id,'status' => $status,'payment_method' => $method])->whereBetween("ride_date",[$start_date,$today])->with(['vehicle'])->orderBy('id','desc')->get();



        $payment_methods = Ride::where(['driver_id' => $driver_id,'status' => $status])->whereBetween("ride_date",[$start_date,$today])->select('payment_method')->distinct()->get();


        return view('admin.earning.detail',compact('driver_info','start_date','today','rides','status','payment_methods','method'));

    }

    //Driver CURD

    public function driver_list(){

        $drivers_list = User::where('role_id',3)->get();
        $vendors = Vendor::where('status',1)->get();
        return view('admin.driver.index',compact('drivers_list','vendors'));
    }
    public function driver_insert(Request $request){

        $request->validate(
            [
                'name' => 'required',
                'nick_name' => 'required',
                'mobile_number' => 'required',
            ]
            );
        
        User::create(
            [
                'name' => $request->name,
                'email' => null,
                'password' => encrypt('123455'),
                'mobile_number' => $request->mobile_number,
                'role_id' => 3,
                'nick_name' => $request->nick_name,
                'company_id' => $request->company_id,
                'emirate' => $request->emirate,
                'car_details' => $request->car_details
            ]
            );
        return response()->json(['success'=>true]);
    }
    public function get_driver($id){
        return response()->json(User::find($id));
    }
    public function driver_update(Request $request,string $id){

         $request->validate(
            [
                'name' => 'required',
                'nick_name' => 'required',
                'mobile_number' => 'required',
            ]
            );
        
        User::where('id',$id)->update(
            [
                'name' => $request->name,
                'email' => null,
                'password' => encrypt('123455'),
                'mobile_number' => $request->mobile_number,
                'role_id' => 3,
                'nick_name' => $request->nick_name,
                'company_id' => $request->company_id,
                'emirate' => $request->emirate,
                'car_details' => $request->car_details
            ]
            );
        return response()->json(['success'=>true]);
    }
    public function driver_delete($id){
        
        User::where('id',$id)->delete();

        session()->flash('success','Driver Delete Successfully');

        return redirect()->route('admin.drivers.list');
    }

    public function travel_agencies_data(){

        $data = TravelAgencies::orderBy('id','desc')->where('type','Travel Agencies')->paginate(10);

        return view('admin.travel_agencies',compact('data'));
    }
    public function corporations_data(){

        $data = TravelAgencies::orderBy('id','desc')->where('type','Corporations')->paginate(10);
        return view('admin.corporations',compact('data'));
    }
    public function holiday_homes_data(){

        $data = TravelAgencies::orderBy('id','desc')->where('type','Holiday Homes')->paginate(10);
        return view('admin.holiday-homes',compact('data'));
    }

     public function export_vendors(){

        try{
            
            
            $filename = "vendors_list-". now()->format('Y-m-d_H-i-s') . ".csv";
            $records = BecomePartner::orderBy('id','desc')->get();


          return Excel::download(new PartnerExport($records), $filename);
                
          } catch (\Throwable $e) {

            return $e->getMessage();
          }
     }  
}
