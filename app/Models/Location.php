<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';

    static public function getRecords($request)
    {
        $data = self::select('locations.*', 'countries.country_name')
            ->join('countries', 'countries.id', '=', 'locations.countries_id')
            ->orderBy('locations.id', 'desc');

        if (!empty(Request::get('id'))) {
            $data = $data->where('locations.id', '=', Request::get('id'));
        }
        if (!empty(Request::get('postal_code'))) {
            $data = $data->where('locations.postal_code', 'like', '%' . Request::get('postal_code') . '%');
        }
        if (!empty(Request::get('city'))) {
            $data = $data->where('locations.city', 'like', '%' . Request::get('city') . '%');
        }
        if (!empty(Request::get('state_province'))) {
            $data = $data->where('locations.state_province', 'like', '%' . Request::get('state_province') . '%');
        }
        if (!empty(Request::get('country_name'))) {
            $data = $data->where('locations.country_name', 'like', '%' . Request::get('country_name') . '%');
        }

        if (!empty(Request::get('created_at'))) {
            $data = $data->where('created_at', 'like', '%' . Request::get('created_at') . '%');
        }
        if (!empty(Request::get('start_date'))) {
            $data = $data->where('job__histories.start_date', '=', Request::get('start_date'));
        }

        if (!empty(Request::get('end_date'))) {
            $data = $data->where('job__histories.end_date', '=', Request::get('end_date'));
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $data = $data->where('jobs.created_at', '>=', Request::get('start_date'))->where('jobs.created_at', '<=', Request::get('end_date'));
        }

        $data = $data->paginate(5);
        return $data;
    }
}
