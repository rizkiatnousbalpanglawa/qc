<?php

namespace App\Exports;

use App\Models\Regency;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegencyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Regency::all();
    }

    public function headings(): array
    {
        return [
            'kode',
            'nama',
        ];
    }
}
