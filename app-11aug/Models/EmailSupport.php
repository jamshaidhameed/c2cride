<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSupport extends Model
{
    protected $fillable = [
        'user_id', 'question', 'subject', 'message'
    ];
}
