<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class JobGrades extends Model
{
    use HasFactory;

    protected $table = 'job_grades';

    static public function getRecords($request){
        $data = self::select('job_grades.*')
                ->orderBy('job_grades.id', 'desc');


        if(!empty(Request::get('id'))) {
            $data = $data->where('id', '=', Request::get('id'));
        }
        if(!empty(Request::get('grade_level'))) {
            $data = $data->where('grade_level', 'like', '%' . Request::get('grade_level') . '%');
        }
        if(!empty(Request::get('lowest_sal'))) {
            $data = $data->where('lowest_sal', 'like', '%' . Request::get('lowest_sal') . '%');
        }
        if(!empty(Request::get('highest_sal'))) {
            $data = $data->where('highest_sal', 'like', '%' . Request::get('highest_sal') . '%');
        }
        if(!empty(Request::get('created_at'))) {
            $data = $data->where('created_at', 'like', '%' . Request::get('created_at') . '%');
        }
        if(!empty(Request::get('updated_at'))) {
            $data = $data->where('updated_at', 'like', '%' . Request::get('updated_at') . '%');
        }

        $data = $data->paginate(5);
        return $data;
    }
}
