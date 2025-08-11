<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }
    public function collection()
    {
        return $this->users;
    }
    public function headings(): array
    {
        return ['Name', 'Email','History','Phone Number','Watsapp number','Amount Spend','Joining Date'];
    }
    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            'Completed:'.$user->completed_rides_count."  Confirmed:".$user->confirmed_rides_count." Pending: ".$user->pending_rides_count." Cancelled: ".$user->canceled_rides_count,
            $user->mobile_number,
            $user->whatsapp,
            !empty($user->completed_rides_sum_price) ? number_format($user->completed_rides_sum_price)." AED" : "0 AED",
            !empty($user->created_at) ? $user->created_at->format('D, M d, Y') : '',
        ];
    }
}
