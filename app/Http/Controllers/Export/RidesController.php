<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RidesExport;
use App\Mail\DailyReportMail;
use App\Models\Ride;
use App\Models\City2CityRide;
use Carbon\Carbon;


class RidesController extends Controller
{
    public function export_daily_earning(){


       $c2crides = Ride::query();
       $c2crides = $c2crides->where('ride_date',Carbon::now()->toDateString());
       $c2crides = $c2crides->orderBy('date_time','ASC')->get();
    
       $city2cityrides = City2CityRide::query();

       $city2cityrides = $city2cityrides->whereDate('date_time',Carbon::today());

        $city2cityrides = $city2cityrides->orderBy('date_time','ASC')->get();

        $result_arr = null;

        $first_array = $c2crides->map(function($item){
            $item->ride_from = "c2cride";
            return $item;
        });

        $second_array = $city2cityrides->map(function($item) {
            $item->ride_from = "city2city";

            return $item;
        });

        $merged = $first_array->merge($second_array);

        $rides = $merged->sortBy("date_time");

        

        $file_name = 'rides_export_' . now()->format('Ymd_His') . '.xlsx';
        
        // return Excel::download(new RidesExport($rides), $file_name);


         Mail::to(env("DAILY_REPORT_EMAIL"))->send(new DailyReportMail($rides));
    }
}
