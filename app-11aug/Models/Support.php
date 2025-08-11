<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'user_id', 'question', 'mobile_number', 'subject', 'message', 'status', 'review'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
