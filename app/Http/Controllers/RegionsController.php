<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Region::getRecords($request);
        return view('region.list', $data);
    }

    public function add()
    {
        return view('region.add');
    }

    public function add_post(Request $request)
    {
        $region = request()->validate([
            'region_name' => 'required',
        ]);

        $region = new Region;
        $region->region_name = trim($request->region_name);
        $region->save();

        return redirect('admin/regions')->with('success', 'Region successfully register');
    }

    public function edit($id)
    {
        $data['getRecord'] = Region::find($id);
        return view('region.edit', $data);
    }


    public function edit_post($id, Request $request)
    {
        $region = request()->validate([
            'region_name' => 'required',
        ]);

        $region = Region::find($id);
        $region->region_name = trim($request->region_name);
        $region->save();

        return redirect('admin/regions')->with('success', 'Region successfully updated');
    }

    public function delete($id)
    {
        $region = Region::find($id);
        $region->delete();

        return redirect()->back()->with('error', 'Record Successfully Delete');
    }
}
