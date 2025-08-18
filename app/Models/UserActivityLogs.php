<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivityLogs extends Model
{
    protected $fillable = ['ride_id','user_id','ip_address','activity'];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function ride(){
        return $this->hasOne(Ride::class,'id','ride_id');
    }
}
