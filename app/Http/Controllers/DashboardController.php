<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use App\Models\Job;
use App\Models\Job_History;
use App\Models\Location;
use App\Models\Manager;
use App\Models\Payroll;
use App\Models\Position;
use App\Models\Region;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::User()->is_role == '1'){
            $data['getEmployeeCount'] = User::count();
            $data['getHRCount'] = User::where('is_role', '=', 1)->count();
            $data['getEmployee'] = User::where('is_role', '=', 0)->count();
            $data['getJobCount'] = Job::count();
            $data['getJobHistoryCount'] = Job_History::count();
            $data['getRegionCount'] = Region::count();
            $data['TodayRegion'] = Region::whereDate('created_at', Carbon::today())->count();
            $data['YesterdayRegion'] = Region::whereDate('created_at', Carbon::yesterday())->count();
            $data['getCountryCount'] = Country::count();
            $data['getLocationCount'] = Location::count();
            $data['getDepartmentCount'] = Department::count();
            $data['getManagerCount'] = Manager::count();
            $data['getPayrollCount'] = Payroll::count();
            $data['getPositionCount'] = Position::count();
            return view('dashboard.list', $data);
        } else if (Auth::User()->is_role == '0') {
            return view('employees.dashboard.list');
        }
    }
}
