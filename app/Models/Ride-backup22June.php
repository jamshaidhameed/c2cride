<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ride extends Model
{
    protected $fillable = [
        'user_id',
        'parent_id',
        'source',
        'mobile_number',
        'destination',
        'ride_type_id',
        'adults',
        'children',
        'luggage',
        'email',
        'child_seats',
        'driver_weeks',
        'driver_days',
        'meet_greet',
        'tour_city',
        'date_time',
        'ride_date',
        'return_time',
        'photograph',
        'ride_time',
        'car',
        'car_id',
        'way',
        'payment_method',
        'status',
        'price',
        'flight_number',
        'duration',
        'distance',
        'whatsapp_number',
        'display_name',
        'old_date_time',
        'booking_code',
        'currency_id',
        'return_date',
        'ride_time',
        'tip_amount',
        'children_seat_amount',
        'photography_amount',
        'discount_amount',
        'note',
        'extra_charges',
        'return_discount',
        'return_discount_amount',
        'return_ride_amount',
        'driver_id',
        'cancel_remarks',
        'assigned_amount',
        'updated_by',
        'is_past'
    ];

    protected $with = 'ridetype';
    //    protected $dates = ['date_time'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ride_updatedby(){

        return $this->hasOne(User::class,'id','updated_by');
    }

    function driver(){
        return $this->hasOne(User::class,'id','driver_id');
    }
    public static function driver_rides($id){

        return self::where('driver_id',$id)->count();
    }
    public static function driver_earning($id){
        return self::where(['driver_id' => $id,'status' => 1])->sum('price');
    }
    function safariPackage(){
        return $this->hasOne(SafariPackages::class,'id','car_id');
    }

    public static function user_car_rides($id){

        return DB::select("SELECT DISTINCT c.title,COUNT(r.id) as total_rides FROM `rides` r JOIN vehicles c ON r.car_id = c.id WHERE r.user_id = ".$id." GROUP BY c.title");
    }
    public function vehicle()
    {
       return $this->hasOne(Vehicle::class, 'id', 'car_id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
    public function ridetype()
    {
        return $this->belongsTo(RideType::class, 'ride_type_id');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupons::class, 'coupon_users')->withPivot('user_id')->withTimestamps();
    }
}
