<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    static public function getRecords($request)
    {
        $data = self::select('countries.*', 'regions.region_name')
            ->join('regions', 'regions.id', '=', 'countries.regions_id')
            ->orderBy('id', 'desc');

        if (!empty(Request::get('id'))) {
            $data = $data->where('countries.id', '=', Request::get('id'));
        }
        if (!empty(Request::get('country_name'))) {
            $data = $data->where('countries.country_name', 'like', '%' . Request::get('country_name') . '%');
        }
        if (!empty(Request::get('region_name'))) {
            $data = $data->where('regions.region_name', 'like', '%' . Request::get('region_name') . '%');
        }

        if (!empty(Request::get('start_date'))) {
            $data = $data->where('countries.created_at', '>=', Request::get('start_date'));
        }

        if (!empty(Request::get('end_date'))) {
            $data = $data->where('countries.created_at', '<=', Request::get('end_date'));
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $data = $data->where('countries.created_at', '>=', Request::get('start_date'))->where('countries.created_at', '<=', Request::get('end_date'));
        }
        
        $data = $data->paginate(5);
        return $data;
    }

    public function get_region_name()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }
}
