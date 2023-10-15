<?php

namespace App\Http\Controllers;

use App\Exports\CountriesExport;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Region;
use Maatwebsite\Excel\Facades\Excel;

class CountriesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecords'] = Country::getRecords($request);
        return view('countries.list', $data);
    }

    public function add()
    {
        $data['getRegions'] = Region::get();

        return view('countries.add', $data);
    }

    public function add_post(Request $request)
    {
        $country = request()->validate([
            'regions_id' => 'required',
            'country_name' => 'required'
        ]);

        $country = new Country;
        $country->country_name = trim($request->country_name);
        $country->regions_id  = trim($request->regions_id);
        $country->save();

        return redirect('admin/countries')->with('success', 'Country successfully register');
    }

    public function edit($id)
    {
        $data['getRecord'] = Country::find($id);
        $data['getRegions'] = Region::get();
        return view('countries.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $country = request()->validate([
            'regions_id' => 'required',
            'country_name' => 'required'
        ]);

        $country = Country::find($id);
        $country->country_name = trim($request->country_name);
        $country->regions_id  = trim($request->regions_id);
        $country->save();

        return redirect('admin/countries')->with('success', 'Country successfully update');
    }

    public function delete($id)
    {
        $country =  Country::find($id);
        $country->delete();

        return redirect()->back()->with('error', 'Record Successfully Delete');
    }

    public function countries_export(Request $request)
    {
        return Excel::download(new CountriesExport, 'countries.xlsx');
    }
}
