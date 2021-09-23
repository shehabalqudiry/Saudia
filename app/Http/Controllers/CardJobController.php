<?php

namespace App\Http\Controllers;

use App\Models\CardJob;
use App\Models\City;
use App\Models\Experience;
use App\Models\ExperienceInSaudia;
use App\Models\Job;
use App\Models\MilitaryServices;
use App\Models\Nationality;
use App\Models\Qualifications;
use App\Models\User;
use Illuminate\Http\Request;

class CardJobController extends Controller
{

    public function index()
    {
        $data['jobs'] = Job::all();
        $data['nationality'] = Nationality::all();
        return view('register')->with($data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // try {

        $request->validate([
            'phone'             => 'required|max:11',
            'national_number'   => 'required|min:13',
        ]);
        $data = $request->except(['qualification_data', 'e_data', 'saudia_data', 'status', 'rate', 'start', 'end', 'military_status']);
        // dd($data);
        $user = User::create($data);

        if ($request->qualification_data) {
            foreach ($request->qualification_data as $q) {
                Qualifications::create([$q]);
            }
        }
        if ($request->e_data) {
            foreach ($request->e_data as $e) {
                Experience::create([$e]);
            }
        }
        if ($request->saudia_data) {
            foreach ($request->saudia_data as $saudia) {
                ExperienceInSaudia::create([$saudia]);
            };
        }
        if ($request->start) {
            MilitaryServices::create([
                'start' => $request->start,
                'end' => $request->end,
                'rate' => $request->rate,
                'military_status' => $request->military_status,
                'user_id'  => $user->id,
            ]);
        }
        return redirect()->back();
        // } catch (\Exception $ex) {
        //     // return $ex->getMessage();
        // }
    }

    public function login(Request $request)
    {
        if ($request->national_number) {
            User::where('national_number', $request->national_number)->first();
            return view('show');
        }
        return view('register');
    }

    public function edit(CardJob $cardJob)
    {
        //
    }

    public function update(Request $request, CardJob $cardJob)
    {
        //
    }

    public function destroy(CardJob $cardJob)
    {
        //
    }

    public function get_cities($id)
    {
        $cities = City::where('nationality_id', $id)->pluck('name', 'id');
        return json_encode($cities);
    }
}
