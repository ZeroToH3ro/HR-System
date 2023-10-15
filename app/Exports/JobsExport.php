<?php

namespace App\Exports;

use App\Models\Job;

use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class JobsExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping {
    public function collection() {
        $request = Request::all();

        return Job::getRecord($request);
    }

    protected int $index = 0;

    public function map($job): array {
        $createdAtFormat = date('d-m-Y', strtotime($job->created_at));

        return [
            ++$this->index,
            $job->id,
            $job->job_title,
            $job->min_salary,
            $job->max_salary,
            $createdAtFormat
        ];
    }

    public function headings(): array {
        return [
            'S.No',
            'ID',
            'Job Title',
            'Min Salary',
            'Max Salary',
            'Created At'
        ];
    }


}
