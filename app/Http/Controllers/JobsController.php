<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Exports\JobsExport;
use Maatwebsite\Excel\Facades\Excel;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Job::getRecord($request);

        return view('jobs.list', $data);
    }

    public function add()
    {
        return view('jobs.add');
    }

    public function add_post(Request $request)
    {
        $job = request()->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
        ]);

        $job = new Job;
        $job->job_title = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);

        $job->save();
        return redirect('admin/jobs')->with('success', 'Job successfully register');
    }

    public function view($id)
    {
        $data['getRecord'] = Job::find($id);
        return view('jobs.view', $data);
    }

    public function edit($id)
    {
        $data['getRecord'] = Job::find($id);
        return view('jobs.edit', $data);
    }

    public function edit_post($id, Request $request)
    {
        $job = request()->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required'
        ]);

        $job = Job::find($id);
        $job->job_title = trim($request->input('job_title'));
        $job->min_salary = trim($request->input('min_salary'));
        $job->max_salary = trim($request->input('max_salary'));
        $job->save();

        return redirect('admin/jobs')->with('success', 'Jobs successfully update');
    }

    public function delete($id)
    {
        $job = Job::find($id);
        $job->delete();

        return redirect()->back()->with('error', 'Record Successfully Delete');
    }

    public function jobs_export(Request $request)
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }
}
