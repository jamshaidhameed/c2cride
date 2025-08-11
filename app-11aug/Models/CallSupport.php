<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallSupport extends Model
{
    protected $fillable = [
        'user_id', 'question', 'mobile_number'
    ];
}
