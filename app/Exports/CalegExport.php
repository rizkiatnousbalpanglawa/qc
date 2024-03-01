<?php

namespace App\Exports;

use App\Models\Caleg;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CalegExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Caleg::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'kode_parpol',
            'nomor_urut',
            'status',
            'nama',
            'dapil',
            'dibuat_pada',
            'diedit_pada',
        ];
    }
}
