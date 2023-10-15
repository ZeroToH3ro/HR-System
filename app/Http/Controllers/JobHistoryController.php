<?php

namespace App\Http\Controllers;

use App\Exports\JobHistoryExport;
use App\Models\Job;
use App\Models\Job_History;
use App\Models\User;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $data['getRecords'] = Job_History::getRecords($request);
        return view('job_history.list', $data);
    }

    public function add()
    {
        $data['getJobs'] = Job::get();
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();

        return view('job_history.add', $data);
    }

    public function add_post(Request $request)
    {
        $jobHistory = request()->validate([
            'job_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'department_id' => 'required',
            'employee_id' => 'required'
        ]);

        $jobHistory = new Job_History;
        $jobHistory->job_id = trim($request->job_id);
        $jobHistory->employee_id = trim($request->employee_id);
        $jobHistory->end_date = trim($request->end_date);
        $jobHistory->start_date = trim($request->start_date);
        $jobHistory->department_id = trim($request->department_id);
        $jobHistory->save();

        return redirect('admin/job_history')->with('success', 'Job History Successful Register');
    }

    public function view($id)
    {
        $data['getRecords'] = Job_History::find($id);

        return view('job_history.view', $data);
    }

    public function edit($id)
    {
        $data['getRecords'] = Job_History::find($id);
        $data['getJobs'] = Job::get();
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();

        return view('job_history.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $jobHistory = request()->validate([
            'job_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'department_id' => 'required',
            'employee_id' => 'required'
        ]);

        $jobHistory = Job_History::find($id);
        $jobHistory->job_id = trim($request->job_id);
        $jobHistory->employee_id = trim($request->employee_id);
        $jobHistory->end_date = trim($request->end_date);
        $jobHistory->start_date = trim($request->start_date);
        $jobHistory->department_id = trim($request->department_id);
        $jobHistory->save();

        return redirect('admin/job_history')->with('success', 'Job History Successful Update');
    }

    public function delete($id)
    {
        $jobHistory = Job_History::find($id);
        $jobHistory->delete();

        return redirect('admin/job_history')->with('error', 'Job History Successful Delete');
    }

    public function job_history_export(Request $request)
    {
        return Excel::download(new JobHistoryExport, 'job_history.xlsx');
    }
}
