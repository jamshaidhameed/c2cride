<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SafariPackages extends Model
{
    //
    protected $fillable = ['name','category','type','price','discount','apply_discount','free_waiting_time','porter_service','meet_and_greet','about','includes','persons','person_text','image','status'];
}
