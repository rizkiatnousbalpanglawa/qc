<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Pemilih;
use App\Models\Pengusul;
use App\Models\Pilihan;
use App\Models\Regency;
use App\Models\Tps;
use App\Models\TpsPemilih;
use App\Models\Village;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Tps::orderBy('village_id')->orderBy('nomor_tps');

        if ($request->has('village_id')) {
            $query->where('village_id', $request->village_id);
        }

        $data['tps'] = $query->orderBy('nomor_tps')
            ->paginate('10');

        $data['kabupaten'] = Regency::whereHas('province', function ($query) {
            $query->where('name', 'SULAWESI SELATAN');
        })->get();
        $data['kelurahan'] = Village::get();
        $data['kecamatan'] = District::get();
        $data['dataTps'] = Tps::distinct('nomor_tps')->get();
        return view('laporan.index', $data);
    }

    public function cetak(Request $request)
    {
        $query = Tps::orderBy('village_id')->orderBy('nomor_tps');

        if ($request->has('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        $data['tps'] = $query->orderBy('nomor_tps')
            ->get();

        $data['kelurahan'] = Village::get();
        $data['kecamatan'] = District::where('id',$request->district_id)->first();

        $pdf = Pdf::loadView('laporan.pdf', $data);

        return $pdf->stream('KECAMATAN_'.$data['kecamatan']->name .'.pdf');
    }
}
