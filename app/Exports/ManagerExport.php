<?php

namespace App\Exports;

use App\Models\Manager;

use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ManagerExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping
{
    public function collection()
    {
        $request = Request::all();

        return Manager::getRecords($request);
    }

    protected int $index = 0;

    public function map($manager): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($manager->created_at));

        return [
            ++$this->index,
            $manager->id,
            $manager->manger_name,
            $manager->manager_email,
            $manager->manager_mobile,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'ID',
            'Manager Name',
            'Email',
            'Mobile',
            'Created At'
        ];
    }
}
