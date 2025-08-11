<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RideAddon extends Model
{
    //
    protected $fillable = ['ride_id','add_on_id','quantity','amount'];

    public function addon(){

        return $this->belongsTo(SafariAddon::class,'add_on_id','id');
    }
}
