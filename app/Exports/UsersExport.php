<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;

class UsersExport implements FromArray
{
    protected $users;

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function array(): array
    {
        return $this->users;
    }
    public function collection()
    {
        $user = User::all([
            "first_name" ,
            "father_name",
            "third_name" ,
            "forth_name" ,
            "birth_day"  ,
            "birth_address",
            "gendar"     ,
            "children"   ,
            "religion"   ,
            "national_number",
            "phone"      ,
            "work_address",
            "email"      ,
            "home_address",
            "spec_title" ,

        ]);

        $user->nationality_id = $user->nationality->name;
        $user->city_id = $user->city->name;
        $user->job_id = $user->job->name;

        return $user;
    }
}
