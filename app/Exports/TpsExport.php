<?php

namespace App\Exports;

use App\Models\Tps;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TpsExport implements FromCollection,  WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tps::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'kode_kabupaten',
            'kode_kecamatan',
            'kode_kelurahan',
            'nomor_tps',
            'target_yrk',
            'target_esr',
            
        ];
    }
}
