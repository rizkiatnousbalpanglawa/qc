<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use App\Models\Pengusul;
use App\Models\Pilihan;
use App\Models\Tps;
use App\Models\TpsPemilih;
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


        $data['tps'] = $query->paginate(15);
        return view('laporan.index', $data);
    }

    public function cetak(Tps $tps)
    {
        $data['tps'] = $tps;
        $data['pilihanPaket'] = Pilihan::where('tps_id', $tps->id)->where('pilihan', 'P')->distinct('tps_pemilih_id')->count();
        $data['pilihanEsr'] = Pilihan::where('tps_id', $tps->id)->where('pilihan', 'E')->distinct('tps_pemilih_id')->count();
        $data['pilihanYrk'] = Pilihan::where('tps_id', $tps->id)->where('pilihan', 'Y')->distinct('tps_pemilih_id')->count();
        // $data['jumlahRelawanY'] = TpsPemilih::where('tps_id',$tps->id)->whereHas('komunitasAnggota')->whereHas('pilihan',function($query){
        //     $query->where('pilihan','Y');
        // })->count();
        // $data['jumlahRelawanE'] = TpsPemilih::where('tps_id',$tps->id)->whereHas('komunitasAnggota')->whereHas('pilihan',function($query){
        //     $query->where('pilihan','E');
        // })->count();
        // $data['jumlahRelawanP'] = TpsPemilih::where('tps_id',$tps->id)->whereHas('komunitasAnggota')->whereHas('pilihan',function($query){
        //     $query->where('pilihan','P');
        // })->count();

        $data['pengusul'] = Pengusul::whereHas('pilihan', function ($query) use ($tps) {
            $query->where('tps_id', $tps->id)
                  ->whereIn('pilihan', ['Y', 'E', 'P']); 
        })->withCount(['pilihan as jumlah_Y' => function ($query) use ($tps) {
            $query->where('pilihan', 'Y')->where('tps_id',$tps->id); 
        }, 'pilihan as jumlah_E' => function ($query) use ($tps) {
            $query->where('pilihan', 'E')->where('tps_id',$tps->id); 
        }, 'pilihan as jumlah_P' => function ($query) use ($tps) {
            $query->where('pilihan', 'P')->where('tps_id',$tps->id); 
        }])->get();
        

        $data['pemilih'] = TpsPemilih::whereHas('pilihan')->where('tps_id',$tps->id)->with(['pilihan','pilihan.pengusul'])->orderBy('nama')->get();


        $pdf = Pdf::loadView('laporan.pdf', $data);

        return $pdf->stream($tps->village->name."_TPS ".$tps->nomor_tps.".pdf");
    }
}
