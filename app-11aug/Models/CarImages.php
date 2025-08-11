<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarImages extends Model
{
    //
    protected $fillable = ['vehicle_id','description','image_path'];

    protected $appends = ['full_url'];

    public function getFullUrlAttribute()
    {
        // Assuming image path is stored in 'filename' column
        return asset('front/images/' . $this->image_path);
    }
    
}
