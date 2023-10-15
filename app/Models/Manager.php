<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Manager extends Model
{
    use HasFactory;
    protected $table = 'managers';

    static public function getRecords($request)
    {
        $data = self::select('managers.*')->orderBy('managers.id', 'desc');

        if (!empty(Request::get('id'))) {
            $data = $data->where('managers.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('manger_name'))) {
            $data = $data->where('managers.manger_name', 'like', '%' . Request::get('manger_name') . '%');
        }

        if (!empty(Request::get('manager_email'))) {
            $data = $data->where('managers.manager_email', 'like', '%' . Request::get('manager_email') . '%');
        }

        if (!empty(Request::get('manager_mobile'))) {
            $data = $data->where('managers.manager_mobile', 'like', '%' . Request::get('manager_mobile') . '%');
        }

        if (!empty(Request::get('start_date'))) {
            $data = $data->where('managers.created_at', '>=', Request::get('start_date'));
        }

        if (!empty(Request::get('end_date'))) {
            $data = $data->where('managers.created_at', '<=', Request::get('end_date'));
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $data = $data->where('managers.created_at', '>=', Request::get('start_date'))->where('managers.created_at', '<=', Request::get('end_date'));
        }

        $data = $data->paginate(5);
        return $data;
    }
}
