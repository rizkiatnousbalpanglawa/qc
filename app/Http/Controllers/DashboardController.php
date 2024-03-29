<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Partisipan;
use App\Models\Pendukung;
use App\Models\SuaraCaleg;
use App\Models\SuaraParpol;
use App\Models\Tps;
use App\Models\TpsPemilih;
use App\Models\UploadC1;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dashboard_is_active'] = 'mm-active';
        $data['jumlahTps_dpr'] = UploadC1::where('status','1')->count('tps_id');
        $data['terahirUpdateDpr'] = UploadC1::where('status','1')->orderByDesc('id')->first();
        $data['jumlahTps_dprd'] = UploadC1::where('status','2')->count('tps_id');
        $data['terahirUpdateDprd'] = UploadC1::where('status','2')->orderByDesc('id')->first();
        
        $data['totalTps'] = Tps::count('id');
        $data['caleg_dpr'] = Caleg::where('status', 1)->pluck('nama');
        $data['suara_caleg_dpr'] = SuaraCaleg::where('status', 1)
            ->with('caleg')
            ->groupBy('caleg_id')
            ->select('caleg_id', DB::raw('SUM(jumlah_suara) as total_suara'))
            ->orderByDesc('total_suara')
            ->get();
        $data['realisasi_esr'] = SuaraCaleg::where('caleg_id', 3)->sum('jumlah_suara');
        $data['realisasi_partai_esr'] = SuaraParpol::where('status', 1)->sum('jumlah_suara');
        
        $data['caleg_dprd_prov'] = Caleg::where('status', 2)->pluck('nama');
        $data['suara_caleg_dprd_prov'] = SuaraCaleg::where('status', 2)
            ->with('caleg')
            ->groupBy('caleg_id')
            ->select('caleg_id', DB::raw('SUM(jumlah_suara) as total_suara'))
            ->orderByDesc('total_suara')
            ->get();
        $data['realisasi_yrk'] = SuaraCaleg::where('caleg_id', 10)->sum('jumlah_suara');
        $data['realisasi_partai_yrk'] = SuaraParpol::where('status', 2)->sum('jumlah_suara');
        
        $data['total_tps'] = Tps::count();
        $data['total_kel'] = Tps::select('village_id')->distinct('village_id')->count();
        $data['total_kec'] = Tps::select('district_id')->distinct('district_id')->count();
        $data['total_kab'] = Tps::select('regency_id')->distinct('regency_id')->count();
        
        $data['jumlahTpsRealisasi'] = UploadC1::distinct('tps_id')->count();
        $data['jumlahKelRealisasi'] = UploadC1::distinct('village_id')->count();
        $data['jumlahKecRealisasi'] = UploadC1::distinct('district_id')->count();
        $data['jumlahKabRealisasi'] = UploadC1::distinct('regency_id')->count();
        $data['jumlahSaksi'] = UploadC1::distinct('saksi_id')->count();
        
        $data['kelTerbanyak'] = SuaraCaleg::select('village_id',DB::raw('SUM(jumlah_suara) as jumlah_suara'))
            ->with('village')
            ->where('caleg_id','3')
            ->groupBy('village_id')
            ->paginate('10');
        
        $data['kecTerbanyak'] = SuaraCaleg::select('district_id',DB::raw('SUM(jumlah_suara) as jumlah_suara'))
            ->with('district')
            ->where('caleg_id','3')
            ->groupBy('district_id')
            ->orderByDesc('jumlah_suara')
            ->paginate(10, ['*'], 'kecTerbanyak');
        
        $data['kecTerbanyak_dprd'] = SuaraCaleg::select('district_id',DB::raw('SUM(jumlah_suara) as jumlah_suara'))
            ->with('district')
            ->where('caleg_id','10')
            ->groupBy('district_id')
            ->orderByDesc('jumlah_suara')
            ->paginate(10, ['*'], 'kecTerbanyak_dprd');
      
        return view('dashboard',$data);
    }
}
