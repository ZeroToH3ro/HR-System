<?php

namespace App\Http\Controllers;

use App\Exports\LocationExport;
use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecords'] = Location::getRecords($request);
        return view('locations.list', $data);
    }

    public function add()
    {
        $data['getCountries'] = Country::get();
        return view('locations.add', $data);
    }


    public function add_post(Request $request)
    {
        $location = request()->validate([
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_province' => 'required',
            'countries_id' => 'required',
        ]);

        $location = new Location;
        $location->street_address = trim($request->street_address);
        $location->postal_code = trim($request->postal_code);
        $location->city = trim($request->city);
        $location->state_province = trim($request->state_province);
        $location->countries_id = trim($request->countries_id);

        $location->save();
        return redirect('admin/locations')->with('success', 'Location successfully register');
    }

    public function edit($id)
    {
        $data['getRecord'] = Location::find($id);
        $data['getCountries'] = Country::get();

        return view('locations.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $location = Location::find($id);
        $location->street_address = trim($request->street_address);
        $location->postal_code = trim($request->postal_code);
        $location->city = trim($request->city);
        $location->state_province = trim($request->state_province);
        $location->countries_id = trim($request->countries_id);
        $location->save();

        return redirect('admin/locations')->with('success', 'Location successfully update');
    }

    public function locations_export()
    {
        return Excel::download(new LocationExport, 'locations.xlsx');
    }
}
