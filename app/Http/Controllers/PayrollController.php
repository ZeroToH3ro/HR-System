<?php

namespace App\Http\Controllers;

use App\Exports\PayrollExport;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecords'] = Payroll::getRecords($request);
        return view('payroll.list', $data);
    }

    public function add()
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        return view('payroll.add', $data);
    }

    public function add_post(Request $request)
    {
        $payroll = new Payroll;
        $payroll->employee_id = trim($request->employee_id);
        $payroll->number_of_day_work = trim($request->number_of_day_work);
        $payroll->bonus = trim($request->bonus);
        $payroll->overtime = trim($request->overtime);
        $payroll->gross_salary = trim($request->gross_salary);
        $payroll->cash_advance = trim($request->cash_advance);
        $payroll->late_hours = trim($request->late_hours);
        $payroll->absent_days = trim($request->absent_days);
        $payroll->sss_contribution = trim($request->sss_contribution);
        $payroll->philhealth = trim($request->philhealth);
        $payroll->total_deductions = trim($request->total_deductions);
        $payroll->netpay = trim($request->netpay);
        $payroll->payroll_monthly = trim($request->payroll_monthly);

        $payroll->save();
        return redirect('admin/payroll')->with('success', 'Payroll successful save');
    }

    public function view($id)
    {
        $data['payroll'] = Payroll::find($id);
        return view('payroll.view', $data);
    }

    public function edit($id)
    {
        $data['payroll'] = Payroll::find($id);
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();

        return view('payroll.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $payroll = Payroll::find($id);
        $payroll->employee_id = trim($request->employee_id);
        $payroll->number_of_day_work = trim($request->number_of_day_work);
        $payroll->bonus = trim($request->bonus);
        $payroll->overtime = trim($request->overtime);
        $payroll->gross_salary = trim($request->gross_salary);
        $payroll->cash_advance = trim($request->cash_advance);
        $payroll->late_hours = trim($request->late_hours);
        $payroll->absent_days = trim($request->absent_days);
        $payroll->sss_contribution = trim($request->sss_contribution);
        $payroll->philhealth = trim($request->philhealth);
        $payroll->total_deductions = trim($request->total_deductions);
        $payroll->netpay = trim($request->netpay);
        $payroll->payroll_monthly = trim($request->payroll_monthly);

        $payroll->save();
        return redirect('admin/payroll')->with('success', 'Payroll successful edit');
    }

    public function delete($id)
    {
        $payroll = Payroll::find($id);
        $payroll->delete();

        return redirect('admin/payroll')->with('error', 'Payroll delete successful');
    }

    public function payroll_export()
    {
        return Excel::download(new PayrollExport, 'payroll.xlsx');
    }
}
