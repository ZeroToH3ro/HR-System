<?php

namespace App\Exports;

use App\Models\Country;
use App\Models\Job;

use Illuminate\Support\Facades\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CountriesExport implements FromCollection, ShouldAutosize, WithHeadings, WithMapping {
    public function collection() {
        $request = Request::all();

        return Country::getRecords($request);
    }

    protected int $index = 0;

    public function map($country): array {
        $createdAtFormat = date('d-m-Y', strtotime($country->created_at));

        return [
            ++$this->index,
            $country->id,
            $country->country_name,
            $country->region_name,
            $createdAtFormat
        ];
    }

    public function headings(): array {
        return [
            'S.No',
            'ID',
            'Country Name',
            'Region Name',
            'Created At'
        ];
    }


}
