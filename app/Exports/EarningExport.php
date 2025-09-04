<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Ride;
use App\Models\Vendor;
use App\Models\Suppliers;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class EarningExport implements FromCollection, WithHeadings, WithMapping
{
    protected $rides;
    protected $counter = 1;
    protected $filterType; // new property

    public function __construct($rides, $filterType = null)
    {
        $this->rides = $rides;
        $this->filterType = $filterType;
    }

    public function collection()
    {
        return $this->rides;
    }

    public function headings(): array
    {
        $headings = [
            'S.No', 
            'Driver Name',
            'Vendor',
            'Contact No',
            'Emirate',
            'Car Details',
            'Supplier',
            'Booking no',
            'Booking Date',
            'Ride Date',
        ];

        // Add Assigned Amount if filter is vendor
        if ($this->filterType === 'vendor') {
            $headings[] = 'Assigned Amount';
        }else{
            $headings[] = 'Ride Amount';
        }

        return $headings;
    }

    public function map($ride): array
    {
        $row = [
            $this->counter++,
            !empty($ride->driver->name) ? $ride->driver->name : "",
            !empty($ride->driver->vendor->name) ? $ride->driver->vendor->name : "",
            !empty($ride->driver->mobile_number) ? $ride->driver->mobile_number : "",
            !empty($ride->driver->emirate) ? $ride->driver->emirate : "",
            !empty($ride->driver->car_details) ? $ride->driver->car_details : "",
            !empty($ride->supplier->name) ? $ride->supplier->name : "",
            $ride->booking_code,
            Carbon::parse($ride->created_at)->format("Y-m-d h:i A"),
            Carbon::parse($ride->date_time)->format("Y-m-d h:i A"),
            
        ];

        // Add Assigned Amount if filter is vendor
        if ($this->filterType === 'vendor') {
            $row[] = $ride->assigned_amount;
        }else{
            $row[] = $ride->price;
        }

        return $row;
    }
}
