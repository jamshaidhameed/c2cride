<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['title','slug','type','passengers','suitcases','free_waiting_time','porter_service','price','discount','apply_discount','images','short_descriptions'];

    function image_list(){
         return $this->hasMany(CarImages::class);
    }

    function cityridepricing(){

       return $this->hasOne(CarType::class,'slug','slug');
    }

    function hourlyridepricing(){

        return $this->hasOne(RidePricing::class, 'car_id', 'id')->where('ride_type_id', 2);
     }

     function citytourpricing(){

        return $this->hasOne(RidePricing::class, 'car_id', 'id')->where('ride_type_id', 3);
     }

    
}
