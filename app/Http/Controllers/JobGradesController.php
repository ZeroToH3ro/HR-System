<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobGrades;

class JobGradesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecords'] = JobGrades::getRecords($request);

        return view('job_grades.list', $data);
    }

    public function add(Request $request)
    {
        return view('job_grades.add');
    }

    public function add_post(Request $request)
    {
        $jobGrades = request()->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required',
        ]);

        $jobGrades = new JobGrades;
        $jobGrades->grade_level = trim($request->grade_level);
        $jobGrades->lowest_sal = trim($request->lowest_sal);
        $jobGrades->highest_sal = trim($request->highest_sal);
        $jobGrades->save();

        return redirect('admin/job_grades')->with('success', 'Job Grades Successful Register');
    }

    public function edit($id)
    {
        $data['jobRecord'] = JobGrades::find($id);
        return view('job_grades.edit', $data);
    }

    public function edit_post($id, Request $request)
    {
        $jobGrades = request()->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required',
        ]);

        $jobGrades = JobGrades::find($id);
        $jobGrades->grade_level = trim($request->grade_level);
        $jobGrades->lowest_sal = trim($request->lowest_sal);
        $jobGrades->highest_sal = trim($request->highest_sal);
        $jobGrades->save();

        return redirect('admin/job_grades')->with('success', 'Job Grades Successful Updated');
    }

    public function view($id)
    {
        $data['jobGrades'] = JobGrades::find($id);

        return view('job_grades.view', $data);
    }

    public function delete($id)
    {
        $jobGrades = JobGrades::find($id);
        $jobGrades->delete();

        return redirect()->back()->with('error', 'Record Successfully Delete');
    }
}
