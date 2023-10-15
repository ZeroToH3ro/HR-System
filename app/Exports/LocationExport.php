<?php

namespace App\Exports;

use App\Models\Location;

use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class LocationExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping
{
    public function collection()
    {
        $request = Request::all();

        return Location::getRecords($request);
    }

    protected int $index = 0;

    public function map($location): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($location->created_at));

        return [
            ++$this->index,
            $location->id,
            $location->street_address,
            $location->postal_code,
            $location->city,
            $location->state_province,
            $location->country_name,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'ID',
            'Street Address',
            'Postal Code',
            'City',
            'State Province',
            'Country Name',
            'Created At'
        ];
    }
}
