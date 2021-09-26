<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class UsersImport implements ToModel
{

    public function model(array $row)
    {
        $user = new User([
            "first_name"        => $row[1],
            "father_name"       => $row[2],
            "third_name"        => $row[3],
            "forth_name"        => $row[4],
            "birth_day"         => $row[5],
            "birth_address"     => $row[6],
            "gendar"            => $row[7],
            "children"          => $row[8],
            "religion"          => $row[9],
            "national_number"   => $row[11],
            "phone"             => $row[12],
            "work_address"      => $row[13],
            "email"             => $row[14],
            "home_address"      => $row[15],
            "spec_title"        => $row[16],
        ]);

        $nationality = Nationality::firstOrCreate([
            'name'  => $row[10],
            'key'   => '0',
        ]);

        $city = City::firstOrCreate([
            'name'  => $row[17],
            'nationality_id'=> $nationality->id,
        ]);

        $job = Job::firstOrCreate([
            'name'  => $row[18],
            'status' => 1,
        ]);

        $user->nationality_id    = $nationality->id;
        $user->nationality_id    = $city->id;
        $user->nationality_id    = $job->id;

        $user->save();
    }
}
