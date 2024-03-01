<?php

namespace App\Exports;

use App\Models\SuaraCaleg;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuaraCalegExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SuaraCaleg::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'id_user',
            'id_saksi',
            'id_kabupaten',
            'id_kecamatan',
            'id_kelurahan',
            'id_tps',
            'id_caleg',
            'kode',
            'status',
            'jumlah_suara',
            'dibuat_pada',
            'diedit_pada',
        ];
    }
}
