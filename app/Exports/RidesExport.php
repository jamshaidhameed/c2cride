<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class RidesExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell, WithEvents
{
    protected $rides;
    protected $counter = 1;
    protected $summary;

    public function __construct($rides)
    {
        $this->rides = $rides;

        // Your summary array
        $this->summary = [
            'Number of Rides'   => $rides->count(),
            'Thriwe'            => collect($rides)->where('source_report','b2b')->count(),
            'Successfull'       => $rides->where('status','1')->count(),
            'Failed'            => $rides->where('status','3')->count(),
            'Watsapp'           => $rides->where('source_report','watsapp')->count(),
            'Card'              => $rides->where('payment_method','card')->count(),
            'Cash'              => $rides->where('payment_method','cash')->count(),
        ];
    }

    public function collection()
    {
        return $this->rides;
    }

    public function startCell(): string
    {
        // Data headings start from Row 3
        return 'A3';
    }

    public function headings(): array
    {
        return [
            'Booking Number', 'Tve Booking Number','Serial Number','Ride Booking Time','Ride Time',
            'Pick Up Location','Dropoff Location','Client Name/ Email','Ride Amount',
            'Assigned amount','Payment Method','Payment link confirmation','Driver`s Tip',
            'Company Name','Driver Name','Source','Remark by c2c team','Cancelled Ride/ Feedback',
            'Ride Extra details'
        ];
    }

    public function map($ride): array
    {
        $remarks = $ride->cancel_remarks;
        $remarks_arr = !empty($remarks) ? explode(",", $remarks) : [];

        return [
            // $ride->ride_from,
            $ride->booking_code,
            $ride->tve_booking_number,
            $this->counter++,
            Carbon::parse($ride->created_at)->format("Y-m-d h:i A"),
            Carbon::parse($ride->date_time)->format("Y-m-d h:i A"),
            $ride->source,
            $ride->destination,
            $ride->display_name . " / " . $ride->email,
            $ride->price,
            $ride->assigned_amount,
            ucwords($ride->payment_method),
            $ride->payment_link_confirmation,
            $ride->tip_amount,
            !empty($ride->driver->company_name) ? $ride->driver->company_name : "",
            !empty($ride->driver->name) ? $ride->driver->name : "",
            $ride->source_report,
            $ride->remarks_by_c2c_team,
            count($remarks_arr) > 0 ? implode(",", $remarks_arr) : "",
            $ride->ride_extra_details
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Row 1 = summary keys
                $col = 'A';
                foreach (array_keys($this->summary) as $key) {
                    $sheet->setCellValue($col.'1', $key);
                    $col++;
                }

                // Row 2 = summary values
                $col = 'A';
                foreach (array_values($this->summary) as $value) {
                    $sheet->setCellValue($col.'2', $value);
                    $col++;
                }
            }
        ];
    }
}
