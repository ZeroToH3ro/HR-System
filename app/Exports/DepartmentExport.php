<?php

namespace App\Exports;

use App\Models\Department;

use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DepartmentExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping
{
    public function collection()
    {
        $request = Request::all();

        return Department::getRecords($request);
    }

    protected int $index = 0;

    public function map($department): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($department->created_at));
        if ($department->manager_id == 1) {
            $managerName = 'Elon Musk';
        } else {
            $managerName = 'Bill Gate';
        }

        return [
            ++$this->index,
            $department->id,
            $department->department_name,
            $department->street_address,
            $managerName,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'ID',
            'Department Name',
            'Location Name',
            'Manager Name',
            'Created At'
        ];
    }
}
