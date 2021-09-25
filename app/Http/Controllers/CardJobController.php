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
                'phone'             => 'required|max:11|unique:users,phone',
                'national_number'   => 'required|min:13|unique:users,national_number',
                'cv'                =>  'required',
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
                "city_id" => $request->city_id,
                "job_id" => $request->job_id,
                'cv'        => $request->file('cv')->getClientOriginalName(),
            ];
            $request->file('cv')->storeAs('cv/' . $request->national_number, $request->file('cv')->getClientOriginalName());
            // dd($request->qualifications[0]['qual_files']->getClientOriginalName());
            $user = User::create($data);
            if ($request->qualifications != null) {
                foreach ($request->qualifications as $d) {
                    Qualifications::create([
                        'qualification_name' => $d['qualification_name'],
                        'spec'               => $d['qualification_spec'],
                        'gradution_year'     => $d['qualification_gradution_year'],
                        'user_id'            => $user->id,
                        'file_name'          => $d['qual_files']->getClientOriginalName(),
                    ]);
                    $d['qual_files']->storeAs('qualifications/' . $request->national_number, $d['qual_files']->getClientOriginalName());
                }
            }
            if ($request->e_data != null) {
                foreach ($request->e_data as $e) {
                    Experience::create([
                        'company_name'  => $e['e_data_company_name'],
                        'job_title'  => $e['e_data_job_title'],
                        'contract_termination'  => $e['e_data_contract_termination'],
                        'job_start'  => $e['e_data_job_start'],
                        'job_end'  => $e['e_data_job_end'],
                        'user_id'   => $user->id,
                        'file_name' => $request->file('e_data_files')->getClientOriginalName(),
                    ]);
                    $e['e_data_files']->storeAs('experirnce/' . $user->national_number, $e['e_data_files']->getClientOriginalName());
                }
            }
            if ($request->saudia_data != null) {
                foreach ($request->saudia_data as $saudia) {
                    ExperienceInSaudia::create([
                        'company_name'  => $saudia['saudia_company_name'],
                        'work_address'  => $saudia['saudia_work_address'],
                        'job_title'  => $saudia['saudia_job_title'],
                        'contract_termination'  => $saudia['saudia_contract_termination'],
                        'job_start'  => $saudia['saudia_job_start'],
                        'job_end'   => $saudia['saudia_job_end'],
                        'file_name' => $saudia['saudia_data_files']->getClientOriginalName(),
                        'user_id'   => $user->id,
                        'status'    => 1,
                    ]);
                $saudia['saudia_data_files']->storeAs('saudia_experirnce/' . $request->national_number, $saudia['saudia_data_files']->getClientOriginalName());
                };
            }
            if ($request->military_status == 'إنهاء الخدمة' and $request->start != null) {
                MilitaryServices::create([
                    'start' => $request->start,
                    'end' => $request->end,
                    'rate' => $request->rate,
                    'military_status' => $request->military_status,
                    'user_id'  => $user->id,
                ]);
            }else {
                MilitaryServices::create([
                    'start' => $request->start,
                    'end' => $request->end,
                    'rate' => $request->rate ?? '',
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

    public function getLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {

        $user = User::where('national_number', $request->national_number)->first();
        if ($user) {
            return view('show', compact(['user']));
        }
        return redirect()->route('jobApply');
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
