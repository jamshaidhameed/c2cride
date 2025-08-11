<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RidePricing extends Model
{
    //
    protected $fillable = ['car_id','ride_type_id','km','increment','hourly_price','five_hour_price','ten_hour_price','airport_extra'];

  function car(){

       return $this->belongsTo(Vehicle::class,'car_id','id');
    }
}
