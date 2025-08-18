<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Ride;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class RidesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $rides;
    protected $counter = 1;

    

    public function __construct($rides)
    {
        $this->rides = $rides;

        
    }
    public function collection()
    {
        return $this->rides;
    }
    public function headings(): array
    {
        return ['Booking Number', 'Tve Booking Number','Serial Number','Ride Booking Time','Ride Time','Pick Up Location','Dropoff Location','Client Name/ Email','Ride Amount','Assigned amount','Payment Method','Payment link confirmation','Driver`s Tip','Company Name','Driver Name','Source','Remark by c2c team','Cancelled Ride/ Feedback','Ride Extra details'];
    }
    public function map($ride): array
    {
        $remarks = $ride->cancel_remarks;
        $remarks_arr = !empty($remarks) ? explode(",",$remarks) : array(); 
        return [
            $ride->booking_code,
            $ride->tve_booking_number,
            $this->counter++,
            Carbon::parse($ride->created_at)->format("Y-m-d h:i A"),
            Carbon::parse($ride->date_time)->format("Y-m-d h:i A"),
            $ride->source,
            $ride->destination,
            $ride->display_name." / ".$ride->email,
            $ride->price,
            $ride->assigned_amount,
            ucwords($ride->payment_method),
            $ride->payment_link_confirmation,
            $ride->tip_amount ,
            !empty($ride->driver->company_name) ? $ride->driver->company_name : "",
            !empty($ride->driver->name)? $ride->driver->name : "",
            $ride->source_report,
            $ride->remarks_by_c2c_team,
            count($remarks_arr) > 0 ? implode(",",$remarks_arr) : "",
            $ride->ride_extra_details

        ];
    }
}
