<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'whatsapp',
        'role_id',
        'address',
        'nick_name',
        'company_name',
        'emirate',
        'car_details'
    ];

    public function rides()
    {
        return $this->hasMany(Ride::class, 'user_id');
    }

    public function completeRides()
    {
        return $this->hasMany(Ride::class, 'user_id')->where('status', '=', 1);
    }

    public function cancelRides()
    {
        return $this->hasMany(Ride::class, 'user_id')->where('status', '=', 3);
    }
    // public function pendingRides()
    // {
    //     return $this->hasMany(Ride::class, 'user_id')->where('status', '=', 2);
    // }

    public function economyRides()
    {
        return $this->hasMany(Ride::class, 'user_id')->where('car', '=', 'economy')->where('status', '=', 1);
    }

    public function comfortRides()
    {
        return $this->hasMany(Ride::class, 'user_id')->where('car', '=', 'comfort')->where('status', '=', 1);
    }

    public function businessRides()
    {
        return $this->hasMany(Ride::class, 'user_id')->where('car', '=', 'business')->where('status', '=', 1);
    }
    public function suvRides()
    {
        return $this->hasMany(Ride::class, 'user_id')->where('car', '=', 'suv')->where('status', '=', 1);
    }

    public function exSuvRides()
    {
        return $this->hasMany(Ride::class, 'user_id')->where('car', '=', 'ex-suv')->where('status', '=', 1);
    }

    public function completedRides()
    {
        return $this->rides()->where('status', 1);
    }

    public function pendingRides()
    {
        return $this->rides()->where('status', 2);
    }

    public function canceledRides()
    {
        return $this->rides()->where('status', 3);
    }

    public function confirmedRides()
    {
        return $this->rides()->where('status', 4);
    }

    public function totalSpent()
    {
        return $this->completedRides()->sum('price');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function supports()
    {
        return $this->hasMany(Support::class, 'user_id');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupons::class, 'coupon_users')->withPivot('ride_id')->withTimestamps();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
