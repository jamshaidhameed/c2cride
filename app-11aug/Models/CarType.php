<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $fillable = ['car_type', 'slug', 'fixed_price', 'above_twenty','above_thirty','above_fifty', 'above_seventy', 'above_hundred','above_hundred_thirty','ariport_additional'];

    function car(){

       return $this->belongsTo(Vehicle::class,'slug','slug');
    }
}
