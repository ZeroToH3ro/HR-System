<?php

namespace App\Exports;

use App\Models\Payroll;

use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PayrollExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping
{
    public function collection()
    {
        $request = Request::all();

        return Payroll::getRecords($request);
    }

    protected int $index = 0;

    public function map($payroll): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($payroll->created_at));

        return [
            ++$this->index,
            $payroll->id,
            $payroll->name,
            $payroll->number_of_day_work,
            $payroll->bonus,
            $payroll->overtime,
            $payroll->gross_salary,
            $payroll->cash_advance,
            $payroll->late_hours,
            $payroll->absent_days,
            $payroll->sss_contribution,
            $payroll->philhealth,
            $payroll->total_deductions,
            $payroll->netpay,
            $payroll->payroll_monthly,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'ID',
            'Name',
            'Day Works',
            'Bonus',
            'Overtime',
            'Gross Salary',
            'Cash Advance',
            'Late Hours',
            'Absent Days',
            'SSS Contribution',
            'Philhealth',
            'Total Deductions',
            'Netpay',
            'Payroll Monthly',
            'Created At'
        ];
    }
}
