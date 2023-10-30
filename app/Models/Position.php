<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    static public function getRecords($request)
    {
        $data = self::select('positions.*')
            ->orderBy('id', 'desc');

        if (!empty(Request::get('id'))) {
            $data = $data->where('positions.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('position_name'))) {
            $data = $data->where('positions.position_name', 'like', '%' . Request::get('position_name') . '%');
        }

        if (!empty(Request::get('working_days_per_month'))) {
            $data = $data->where('positions.working_days_per_month', 'like', '%' . Request::get('working_days_per_month') . '%');
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $data = $data->where('positions.created_at', '>=', Request::get('start_date'))->where('positions.created_at', '<=', Request::get('end_date'));
        }

        $data = $data->paginate(5);
        return $data;
    }
}
