<?php

namespace App\Http\Controllers;

use App\Exports\PositionExport;
use App\Models\Position;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecords'] = Position::getRecords($request);

        return view('position.list', $data);
    }

    public function add()
    {
        return view('position.add');
    }

    public function add_post(Request $request)
    {
        $position = request()->validate([
            'position_name' => 'required',
            'daily_rate' => 'required',
            'monthly_rate' => 'required',
            'working_days_per_month' => 'required'
        ]);

        $position = new Position;
        $position->position_name = trim($request->position_name);
        $position->daily_rate = trim($request->daily_rate);
        $position->monthly_rate = trim($request->monthly_rate);
        $position->working_days_per_month = trim($request->working_days_per_month);

        $position->save();
        return redirect('admin/position')->with('success', 'Position save successful');
    }

    public function edit($id)
    {
        $data['position'] = Position::find($id);
        return view('position.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $position = request()->validate([
            'position_name' => 'required',
            'daily_rate' => 'required',
            'monthly_rate' => 'required',
            'working_days_per_month' => 'required'
        ]);

        $position = Position::find($id);
        $position->position_name = trim($request->position_name);
        $position->daily_rate = trim($request->daily_rate);
        $position->monthly_rate = trim($request->monthly_rate);
        $position->working_days_per_month = trim($request->working_days_per_month);

        $position->save();
        return redirect('admin/position')->with('success', 'Position edit successful');
    }

    public function delete($id)
    {
        $position = Position::find($id);
        $position->delete();

        return redirect('admin/position')->with('error', 'Position delete successful');
    }

    public function position_export()
    {
        return Excel::download(new PositionExport, 'position.xlsx');
    }
}
