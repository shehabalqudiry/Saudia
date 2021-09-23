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
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try {

            $request->validate([
                'phone'             => 'required|max:11',
                'national_number'   => 'required|min:13|unique:users,national_number',
            ]);
            $data = [
                "first_name" => $request->first_name,
                "father_name" => $request->father_name,
                "third_name" => $request->third_name,
                "forth_name" => $request->forth_name,
                "birth_day" => $request->birth_day,
                "birth_address" => $request->birth_address,
                "gendar" => $request->gendar,
                "children" => $request->children,
                "religion" => $request->religion,
                "nationality_id" => $request->nationality_id,
                "national_number" => $request->national_number,
                "phone" => $request->phone,
                "work_address" => $request->work_address,
                "email" => $request->email,
                "home_address" => $request->home_address,
                "spec_title" => $request->spec_title,
            ];
            // dd($data);
            $user = User::create($data);

            if ($request->qualification_data != null) {
                foreach ($request->qualification_data as $q) {
                    Qualifications::create([
                        'qualification_name' => $q->qualification_name,
                        'spec'               => $q->spec,
                        'address'            => $q->address,
                        'schoole'            => $q->schoole,
                        'years_count'        => $q->years_count,
                        'gradution_year'     => $q->gradution_year,
                        'degree'             => $q->degree,
                        'user_id'            => $user->id,
                    ]);
                }
            }
            if ($request->e_data != null) {
                foreach ($request->e_data as $e) {
                    Experience::create([
                        'company_name'  => $e->company_name,
                        'job_title'  => $e->job_title,
                        'contract_termination'  => $e->contract_termination,
                        'job_start'  => $e->job_start,
                        'job_end'  => $e->job_end,
                        'user_id'   => $user->id,
                    ]);
                }
            }
            if ($request->saudia_data != null) {
                foreach ($request->saudia_data as $saudia) {
                    ExperienceInSaudia::create([
                        'company_name'  => $saudia->company_name,
                        'work_address'  => $saudia->work_address,
                        'job_title'  => $saudia->job_title,
                        'contract_termination'  => $saudia->contract_termination,
                        'job_start'  => $saudia->job_start,
                        'job_end'   => $user->job_end,
                        'user_id'   => $user->id,
                    ]);
                };
            }
            if ($request->start != null) {
                MilitaryServices::create([
                    'start' => $request->start,
                    'end' => $request->end,
                    'rate' => $request->rate,
                    'military_status' => $request->military_status,
                    'user_id'  => $user->id,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'تم تقديم الطلب وجاري المراجعة');
        } catch (\Exception $excep) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error', $excep->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        if ($request->national_number) {
            $user = User::where('national_number', $request->national_number)->first();
            return view('show', compact(['user']));
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
