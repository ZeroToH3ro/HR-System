<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Region extends Model
{
    use HasFactory;
    protected $table = 'regions';

    static public function getRecords($request)
    {
        $data = self::select('regions.*')->orderBy('id', 'desc');

        if (!empty(Request::get('id'))) {
            $data = $data->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('region_name'))) {
            $data = $data->where('region_name', 'like', '%' . Request::get('region_name' . '%'));
        }
        if (!empty(Request::get('created_at'))) {
            $data = $data->where('created_at', 'like', '%' . Request::get('created_at') . '%');
        }
        if (!empty(Request::get('updated_at'))) {
            $data = $data->where('updated_at', 'like', '%' . Request::get('updated_at') . '%');
        }

        $data = $data->paginate(5);
        return $data;
    }
}
