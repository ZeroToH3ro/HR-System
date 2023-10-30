<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Payroll extends Model
{
    use HasFactory;
    protected $table = "payrolls";

    static public function getRecords($request)
    {
        $data = self::select('payrolls.*', 'users.name')
            ->join('users', 'users.id', '=', 'payrolls.employee_id')
            ->orderBy('id', 'desc')
            ->paginate(5);

        if (!empty(Request::get('id'))) {
            $data = $data->where('payrolls.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('employee_id'))) {
            $data = $data->where('users.name', 'like', '%' . Request::get('employee_id') . '%');
        }

        if (!empty(Request::get('number_of_day_work'))) {
            $data = $data->where('payrolls.number_of_day_work', 'like', '%' . Request::get('number_of_day_work') . '%');
        }

        if (!empty(Request::get('bonus'))) {
            $data = $data->where('payrolls.bonus', 'like', '%' . Request::get('bonus') . '%');
        }

        if (!empty(Request::get('overtime'))) {
            $data = $data->where('payrolls.overtime', 'like', '%' . Request::get('overtime') . '%');
        }

        if (!empty(Request::get('start_date'))) {
            $data = $data->where('payrolls.start_date', '=', Request::get('start_date'));
        }

        if (!empty(Request::get('end_date'))) {
            $data = $data->where('payrolls.end_date', '=', Request::get('end_date'));
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $data = $data->where('payrolls.created_at', '>=', Request::get('start_date'))->where('jobs.created_at', '<=', Request::get('end_date'));
        }

        return $data;
    }

    public function get_single_employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
