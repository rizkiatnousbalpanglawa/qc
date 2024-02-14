<?php

namespace App\Imports;

use App\Models\TpsPemilih;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TpsPemilihImpor implements ToModel, WithStartRow
{
    private $tps_id;

    public function __construct($tps_id)
    {
        $this->tps_id = $tps_id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new TpsPemilih([
            'nama' => $row[1],
            'jenis_kelamin' => $row[2],
            'usia' => $row[3],
            'tps_id' => $this->tps_id,
            // 'nilai_baru' => $this->tps_id,
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 7; // Mulai dari baris kelima
    }
}
