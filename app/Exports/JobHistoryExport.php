<?php

namespace App\Exports;

use App\Models\Job;

use App\Models\Job_History;
use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class JobHistoryExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping
{
    public function collection()
    {
        $request = Request::all();

        return Job_History::getRecords($request);
    }

    protected int $index = 0;

    public function map($jobHistory): array
    {
        $createdAtFormat = date('d-m-Y H:i A', strtotime($jobHistory->created_at));
        $startDate = date('d-m-Y', strtotime($jobHistory->start_date));
        $endDate = date('d-m-Y', strtotime($jobHistory->end_date));

        if ($jobHistory->department_id == 1) {
            $department = 'Developer Department';
        } else {
            $department = 'BDM Department';
        }

        return [
            ++$this->index,
            $jobHistory->id,
            $jobHistory->name . ' ' .  $jobHistory->last_name,
            $jobHistory->job_title,
            $startDate,
            $endDate,
            $department,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'ID',
            'Employment Name',
            'Job Title',
            'Start Date',
            'End Date',
            'Department ID',
            'Created At'
        ];
    }
}
