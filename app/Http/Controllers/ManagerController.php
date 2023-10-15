<?php

namespace App\Http\Controllers;

use App\Exports\ManagerExport;
use App\Models\Manager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecords'] = Manager::getRecords($request);
        return view('manager.list', $data);
    }

    public function add()
    {
        return view('manager.add');
    }

    public function add_post(Request $request)
    {
        $manager = request()->validate([
            'manger_name' => 'required|unique:managers',
            'manager_mobile' => 'required',
            'manager_email' => 'required'
        ]);

        $manager = new Manager;
        $manager->manger_name = trim($request->manger_name);
        $manager->manager_mobile = trim($request->manager_mobile);
        $manager->manager_email = trim($request->manager_email);
        $manager->save();

        return redirect('admin/manager')->with('success', 'Manager Successful Register');
    }

    public function edit($id)
    {
        $data['getRecord'] = Manager::find($id);
        return view('manager.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $manager = request()->validate([
            'manger_name' => 'required|unique:managers',
            'manager_mobile' => 'required',
            'manager_email' => 'required'
        ]);

        $manager = Manager::find($id);
        $manager->manger_name = trim($request->manger_name);
        $manager->manager_mobile = trim($request->manager_mobile);
        $manager->manager_email = trim($request->manager_email);
        $manager->save();

        return redirect('admin/manager')->with('success', 'Manager Successful Update');
    }

    public function delete($id)
    {
        $manager = Manager::find($id);
        $manager->delete();

        return redirect('admin/manager')->with('error', 'Manager Successful Delete');
    }

    public function manager_export()
    {
        return Excel::download(new ManagerExport, 'manager.xlsx');
    }
}
