<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = ['job_title', 'min_salary', 'max_salary'];

    static public function getRecord($request)
    {
        $records = self::select('jobs.*');

        if (!empty(Request::get('id'))) {
            $records = $records->where('id', '=', Request::get('id'));
        }
        if(!empty(Request::get('job_title'))) {
            $records = $records->where('job_title', 'like', '%' . Request::get('job_title') . '%');
        }
        if(!empty(Request::get('min_salary'))) {
            $records = $records->where('min_salary', '=', Request::get('min_salary'));
        }
        if(!empty(Request::get('max_salary'))) {
            $records = $records->where('max_salary', '=', Request::get('max_salary'));
        }
        if(!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $records = $records->where('jobs.created_at', '>=', Request::get('start_date'))->where('jobs.created_at', '<=', Request::get('end_date'));
        }


        $records = $records
            ->orderBy('id', 'desc')
            ->paginate(5);
        return $records;
    }
}
