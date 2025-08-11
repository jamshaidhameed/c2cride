<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelAgencies extends Model
{
    //
    protected $fillable = ['type','name','email','phone','watsapp','business_name','company_website','position','country_of_registration','address','anticipated_booking','proposed_date','message','files'];
}
