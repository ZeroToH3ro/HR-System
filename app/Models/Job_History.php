<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Request;



class Job_History extends Model
{
    use HasFactory;
    protected $table = 'job__histories';

    static public function getRecords($request)
    {
        $data = self::select('job__histories.*', 'users.name', 'users.last_name', 'jobs.job_title')
            ->join('users', 'users.id', '=', 'job__histories.employee_id')
            ->join('jobs', 'jobs.id', '=', 'job__histories.job_id')
            ->orderBy('job__histories.id', 'desc');

        if (!empty(Request::get('id'))) {
            $data = $data->where('job__histories.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('name'))) {
            $data = $data->where('users.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('start_date'))) {
            $data = $data->where('job__histories.start_date', '=', Request::get('start_date'));
        }

        if (!empty(Request::get('end_date'))) {
            $data = $data->where('job__histories.end_date', '=', Request::get('end_date'));
        }

        if (!empty(Request::get('job_title'))) {
            $data = $data->where('jobs.job_title', 'like', '%' . Request::get('job_title') . '%');
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $data = $data->where('jobs.created_at', '>=', Request::get('start_date'))->where('jobs.created_at', '<=', Request::get('end_date'));
        }

        $data = $data->paginate(5);
        return $data;
    }

    public function get_user_single()
    {
        return $this->belongsTo(User::class, "employee_id");
    }

    public function get_job_single()
    {
        return $this->belongsTo(Job::class, "job_id");
    }
}
