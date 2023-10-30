<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Manager;
use App\Models\Position;
use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $data['getPositions'] = Position::get();

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
            'department_id' => 'required',
            'position_id' => 'required'
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
        $user->position_id = trim($request->position_id);
        $user->is_role = 0;

        if (!empty($request->file('profile_image'))) {
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $fileName = $randomStr . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/profile');
            $file->move($destinationPath, $fileName);
            $user->profile_image = $fileName;
        }

        if ($user->save()) {
            return redirect('admin/employees')->with('success', 'Employees successfully register');
        } else {
            return redirect('admin/employees')->with('error', 'Employees save fail');
        }
    }

    public function view($id)
    {
        $data['getRecord'] = User::find($id);

        return view('employees.view', $data);
    }

    public function edit($id)
    {
        $data['getRecord'] = User::find($id);
        $data['getJobs'] = Job::get();
        $data['getManagers'] = Manager::get();
        $data['getDepartments'] = Department::get();
        $data['getPositions'] = Position::get();

        return view('employees.edit', $data);
    }

    public function edit_post($id, Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,' . $id
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
        $user->position_id = trim($request->position_id);

        if ($user->is_role == 1) {
            $user->is_role = 1;
        } else {
            $user->is_role = 0;
        }

        if (!empty($request->file('profile_image'))) {
            if (!empty($user->profile_image) && file_exists(public_path('images/profile/' . $user->profile_image))) {
                unlink('images/profile/' . $user->profile_image);
            }
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $fileName = $randomStr . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/profile');
            $file->move($destinationPath, $fileName);
            $user->profile_image = $fileName;
        }

        $user->save();
        return redirect('admin/employees')->with('success', 'Employees successfully update');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('error', 'Record Successfully Delete');
    }
}
