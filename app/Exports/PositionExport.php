<?php

namespace App\Exports;

use App\Models\Position;

use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PositionExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping
{
    public function collection()
    {
        $request = Request::all();

        return Position::getRecords($request);
    }

    protected int $index = 0;

    public function map($position): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($position->created_at));

        return [
            ++$this->index,
            $position->id,
            $position->name,
            $position->daily_rate,
            $position->monthly_rate,
            $position->working_days_per_month,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'ID',
            'Name',
            'Daily Rate',
            'Monthly Rate',
            'Working Day Per Month',
            'Created At'
        ];
    }
}
