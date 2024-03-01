<?php

namespace App\Exports;

use App\Models\Parpol;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParpolExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Parpol::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'nama',
            'nomor_urut',
            'dibuat_pada',
            'diedit_pada',
        ];
    }
}
