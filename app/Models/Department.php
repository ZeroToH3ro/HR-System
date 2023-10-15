<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';

    static public function getRecords($request)
    {
        $data = self::select('departments.*', 'locations.street_address')
            ->join('locations', 'locations.id', '=', 'departments.locations_id')
            ->orderBy('departments.id', 'desc');

        if (!empty(Request::get('id'))) {
            $data = $data->where('departments.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('department_name'))) {
            $data = $data->where('departments.department_name', 'like', '%' . Request::get('department_name') . '%');
        }

        if (!empty(Request::get('street_address'))) {
            $data = $data->where('locations.street_address', 'like', '%' . Request::get('street_address') . '%');
        }

        if (!empty(Request::get('start_date'))) {
            $data = $data->where('departments.created_at', '>=', Request::get('start_date'));
        }

        if (!empty(Request::get('end_date'))) {
            $data = $data->where('departments.created_at', '<=', Request::get('end_date'));
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $data = $data->where('departments.created_at', '>=', Request::get('start_date'))->where('departments.created_at', '<=', Request::get('end_date'));
        }
        
        $data = $data->paginate(5);
        return $data;
    }
}
