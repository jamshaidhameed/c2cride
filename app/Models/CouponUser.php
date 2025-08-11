<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponUser extends Model
{
    protected $table = 'coupon_users';

    protected $fillable = ['ride_id','coupons_id','user_id'];

    public function ride(){
        return $this->belongsTo(Ride::class,'ride_id','id');
    }
    public function user(){

       return $this->belongsTo(User::class,'user_id','id'); 
    }
    function copoun(){
        return $this->belongsTo(Coupons::class,'coupons_id','id');
    }
    
}
