<?php

namespace App\Http\Controllers;

use App\Models\Pengusul;
use App\Models\Pilihan;
use App\Models\TpsPemilih;
use Barryvdh\DomPDF\Facade\Pdf;
use iio\libmergepdf\Merger;
use Illuminate\Http\Request;

class LaporanPengusulController extends Controller
{
    public function index(Request $request)
    {
        $data['laporan_pengusul_is_active'] = 'mm-active';
        return view('laporan-pengusul.index', $data);
    }

    public function cetak(Pengusul $pengusul)
    {
        $data['pengusul'] = $pengusul;
        $data['pilihanPaket'] = Pilihan::where('pengusul_id', $pengusul->id)->where('pilihan', 'P')->distinct('tps_pemilih_id')->count();
        $data['pilihanEsr'] = Pilihan::where('pengusul_id', $pengusul->id)->where('pilihan', 'E')->distinct('tps_pemilih_id')->count();
        $data['pilihanYrk'] = Pilihan::where('pengusul_id', $pengusul->id)->where('pilihan', 'Y')->distinct('tps_pemilih_id')->count();

        $data['pengusul'] = Pengusul::whereHas('pilihan', function ($query) use ($pengusul) {
            $query->where('pengusul_id', $pengusul->id)
                  ->whereIn('pilihan', ['Y', 'E', 'P']); 
        })->withCount(['pilihan as jumlah_Y' => function ($query) use ($pengusul) {
            $query->where('pilihan', 'Y')->where('pengusul_id',$pengusul->id); 
        }, 'pilihan as jumlah_E' => function ($query) use ($pengusul) {
            $query->where('pilihan', 'E')->where('pengusul_id',$pengusul->id); 
        }, 'pilihan as jumlah_P' => function ($query) use ($pengusul) {
            $query->where('pilihan', 'P')->where('pengusul_id',$pengusul->id); 
        }])->get();
        

        $data['pilihan'] = Pilihan::where('pengusul_id',$pengusul->id)->with(['pengusul'])
                            ->with('tpsPemilih', function($query){
                                $query->orderBy('nama');
                             })
                             ->with('regency', function($query){
                                $query->orderBy('name');
                             })
                             ->with('district', function($query){
                                $query->orderBy('name');
                             })
                             ->with('village', function($query){
                                $query->orderBy('name');
                             })
                             ->with('tps', function($query){
                                $query->orderBy('nomor_tps');
                             })
                             ->get(); 


        // $pdf = Pdf::loadView('laporan-pengusul.pdf', $data);

        // return $pdf->stream();

        $m = new Merger();
        $pdf = PDF::loadView('laporan-pengusul.pdf',$data)->setPaper('a4', 'potrait');

        $m->addRaw($pdf->output());

        $pdf2 = PDF::loadView('laporan-pengusul.pdf2',$data)->setPaper('a4', 'landscape');

        $m->addRaw($pdf2->output());
        return response($m->merge())
                ->withHeaders([
                    'Content-Type' => 'application/pdf',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.$pengusul->nama.'.pdf',
                ]);
    }
}
