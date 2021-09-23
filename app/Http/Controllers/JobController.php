<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $data['jobs'] = Job::all();
        return view('admin.jobs.index')->with($data);
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        Job::create([
            'job_title' => $request->job_title,
            'status'    => 1,
        ]);
        return redirect()->route('jobs.index');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact($job));
    }

    public function update(Request $request, Job $job)
    {
        $job->update([
            'job_title' => $request->job_title,
            'status' => $request->status,
        ]);

        return redirect()->route('jobs.index');
    }


    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
