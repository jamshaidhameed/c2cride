<?php

namespace App\Exports;

use App\Models\BecomePartner;
use App\Models\BecomePartnerFiles;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class PartnerExport implements FromCollection, WithHeadings, WithMapping
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
        return ['Name', 'Email', 'Phone','Address','Emirates','Are you ?','Registered As','Message','attachements'];
    }
    public function map($user): array
    {

        $files = BecomePartnerFiles::where('partner_id',$user->id)->get();
        
        $files_arr = array();
        foreach ($files as $file) {
            
            array_push($files_arr,asset('upload/partners/'.$file->file_path));
        }
        return [
            $user->first_name." ".$user->last_name,
            $user->email,
            $user->phone,
            $user->address,
            $user->emirates,
            $user->are_you,
            $user->are_you_register,
            $user->message,
            count($files_arr) > 0 ? implode(",",$files_arr) : ""
        ];
    }
}
