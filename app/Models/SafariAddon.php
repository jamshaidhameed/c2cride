<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SafariAddon extends Model
{
    //
    protected $fillable = ['title','description','price','discount','apply_discount','image'];
}
