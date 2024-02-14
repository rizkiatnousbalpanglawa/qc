<?php

namespace App\Http\Controllers;

use App\Imports\TpsPemilihImpor;
use App\Models\Tps;
use App\Models\TpsPemilih;
use App\Models\Village;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TpsPemilihController extends Controller
{

    public function import_excel(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // Tangkap nilai dari controller
        $tps_id = $request->tps_id;

        // Menangkap file excel
        $file = $request->file('file');

        // Membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // Upload ke folder file_siswa di dalam folder public
        $file->move('file_impor', $nama_file);

        // Import data dengan menyertakan nilai dari controller
        Excel::import(new TpsPemilihImpor($tps_id), public_path('/file_impor/' . $nama_file));

        // Notifikasi dengan session
        alert('sukses', 'Data TPS Pemilih Berhasil Diimport!', 'success');

        // Alihkan halaman kembali
        return redirect('/tps');
    }
}
