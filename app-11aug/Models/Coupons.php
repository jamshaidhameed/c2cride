<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $fillable = [
        'code',
        'discount_amount',
        'discount_percentage',
        'valid_from',
        'valid_until',
        'usage_limit',
        'times_used',
        'active',
        'ride_type_id',
        'show_on_front',
        'show_at_front'
    ];

    protected $dates = [
        'valid_from',
        'valid_until',
    ];

    public function ride_type(){
        return $this->hasOne(RideType::class,'id','ride_type_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_users')->withPivot('ride_id')->withTimestamps();
    }

    public function rides()
    {
        return $this->belongsToMany(Ride::class, 'coupon_users')->withPivot('user_id')->withTimestamps();
    }


    public function isValid()
    {
        $now = now();
        return $this->active &&
            $this->times_used < $this->usage_limit &&
            (!$this->valid_from || $this->valid_from <= $now) &&
            (!$this->valid_until || $this->valid_until >= $now);
    }
}
