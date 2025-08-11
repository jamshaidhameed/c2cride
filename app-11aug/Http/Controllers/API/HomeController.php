<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupons;
use App\Models\Vehicle;
use App\Models\CarType;
use Carbon\Carbon;

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
    public function car_price($ride_type_id,$car_id){

        
    }
}
