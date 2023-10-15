<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Manager;
use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $data['getRecord'] = User::getRecord();
        return view('employees.list', $data);
    }

    public function add()
    {
        $data['getJobs'] = Job::get();
        $data['getManagers'] = Manager::get();
        $data['getDepartments'] = Department::get();
        
        return view('employees.add', $data);
    }

    public function add_post(Request $request)
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->phone_number = trim($request->phone_number);
        $user->email = trim($request->email);
        $user->hire_date = trim($request->hire_date);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->job_id = trim($request->job_id);
        $user->is_role = 0;

        $user->save();
        return redirect('admin/employees')->with('success', 'Employees successfully register');
    }

    public function view($id) {
        $data['getRecord'] = User::find($id);

        return view('employees.view', $data);
    }

    public function edit($id) {
        $data['getRecord'] = User::find($id);
        $data['getJobs'] = Job::get();

        return view('employees.edit', $data);
    }

    public function edit_post($id, Request $request) {
        $user = request()->validate([
            'email' => 'required|unique:users,email,'.$id
        ]);

        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->phone_number = trim($request->phone_number);
        $user->email = trim($request->email);
        $user->hire_date = trim($request->hire_date);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->job_id = trim($request->job_id);
        $user->is_role = 0;

        $user->save();
        return redirect('admin/employees')->with('success', 'Employees successfully update');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('error', 'Record Successfully Delete');
    }
}