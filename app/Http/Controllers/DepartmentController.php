<?php

namespace App\Http\Controllers;

use App\Exports\DepartmentExport;
use App\Models\Department;
use App\Models\Location;
use App\Models\Manager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecords'] = Department::getRecords($request);
        return view('departments.list', $data);
    }

    public function add()
    {
        $data['getLocations'] = Location::get();
        $data['getManagers'] = Manager::get();

        return view('departments.add', $data);
    }

    public function add_post(Request $request)
    {
        $department = request()->validate([
            'department_name' => 'required',
            'locations_id' => 'required',
            'manager_id' => 'required',
        ]);

        $department = new Department;
        $department->department_name = trim($request->department_name);
        $department->manager_id = trim($request->manager_id);
        $department->locations_id = trim($request->locations_id);
        $department->save();

        return redirect('admin/departments')->with('success', 'Department Successful Register');
    }

    public function edit($id)
    {
        $data['getRecord'] = Department::find($id);
        $data['getLocations'] = Location::get();
        $data['getManagers'] = Manager::get();

        return view('departments.edit', $data);
    }

    public function edit_post($id, Request $request)
    {
        $department = request()->validate([
            'department_name' => 'required',
            'locations_id' => 'required',
            'manager_id' => 'required',
        ]);

        $department = Department::find($id);
        $department->department_name = trim($request->department_name);
        $department->manager_id = trim($request->manager_id);
        $department->locations_id = trim($request->locations_id);
        $department->save();

        return redirect('admin/departments')->with('success', 'Department Successful Update');
    }

    public function delete($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect('admin/departments')->with('error', 'Department Successful Delete');
    }

    public function departments_export()
    {
        return Excel::download(new DepartmentExport, 'department.xlsx');
    }
}
