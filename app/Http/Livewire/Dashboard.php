<?php

namespace App\Http\Livewire;

use App\Models\Caleg;
use App\Models\District;
use App\Models\Pilihan;
use App\Models\Status;
use App\Models\SuaraCaleg;
use App\Models\SuaraParpol;
use App\Models\Tps;
use App\Models\TpsPemilih;
use App\Models\UploadC1;
use App\Models\Village;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // $pemilih =  TpsPemilih::get();
        // $data['pemilih'] = $pemilih;
        $data['caleg_dpr'] = Caleg::where('status', 1)->pluck('nama');
        $data['suara_caleg_dpr'] = SuaraCaleg::where('status', 1)
            ->groupBy('caleg_id')
            ->select('caleg_id', DB::raw('SUM(jumlah_suara) as total_suara'))
            ->with(['caleg'])
            ->orderByDesc('total_suara')
            ->get();
        $data['realisasi_esr'] = SuaraCaleg::where('caleg_id', 3)->sum('jumlah_suara');
        $data['realisasi_partai_esr'] = SuaraParpol::where('status', 1)->sum('jumlah_suara');

        $data['caleg_dprd_prov'] = Caleg::where('status', 2)->pluck('nama');
        $data['suara_caleg_dprd_prov'] = SuaraCaleg::where('status', 2)
            ->groupBy('caleg_id')
            ->select('caleg_id', DB::raw('SUM(jumlah_suara) as total_suara'))
            ->with(['caleg'])
            ->orderByDesc('total_suara')
            ->get();
        $data['realisasi_yrk'] = SuaraCaleg::where('caleg_id', 10)->sum('jumlah_suara');
        $data['realisasi_partai_yrk'] = SuaraParpol::where('status', 2)->sum('jumlah_suara');
        // $data['total_pendukung'] = TpsPemilih::count();
        // $pemilihEsr = Pilihan::where('pilihan','E')->distinct('tps_pemilih_id')->count();
        // $pemilihYrk = Pilihan::where('pilihan', 'Y')->distinct('tps_pemilih_id')->count();
        // $pemilihPaket = Pilihan::where('pilihan', 'P')->distinct('tps_pemilih_id')->count();

        // $data['pemilih_esr'] = $pemilihEsr;
        // $data['pemilih_yrk'] = $pemilihYrk;
        // $data['pemilih_paket'] = $pemilihPaket;

        $data['total_tps'] = Tps::count();
        $data['total_kel'] = Tps::select('village_id')->distinct('village_id')->count();
        $data['total_kec'] = Tps::select('district_id')->distinct('district_id')->count();
        $data['total_kab'] = Tps::select('regency_id')->distinct('regency_id')->count();

        // $data['pemilih_kip'] = Status::where('status', 'K')->distinct('tps_pemilih_id')->count();
        // $data['pemilih_pip'] = Status::where('status', 'P')->distinct('tps_pemilih_id')->count();
        // $data['pemilih_lainnya'] = Status::where('status', 'L')->distinct('tps_pemilih_id')->count();
        // $data['pemilih_kp'] = Status::where('status', 'PK')->distinct('tps_pemilih_id')->count();

        $data['jumlahTpsRealisasi'] = UploadC1::distinct('tps_id')->count();
        $data['jumlahKelRealisasi'] = UploadC1::distinct('village_id')->count();
        $data['jumlahKecRealisasi'] = UploadC1::distinct('district_id')->count();
        $data['jumlahKabRealisasi'] = UploadC1::distinct('regency_id')->count();
        $data['jumlahSaksi'] = UploadC1::distinct('saksi_id')->count();

        // $data['dataPilihan'] = Pilihan::with(['village','district'])->get();
        $data['kelTerbanyak'] = SuaraCaleg::select('village_id',DB::raw('SUM(jumlah_suara) as jumlah_suara'))
        ->with(['village'])
        ->where('caleg_id','3')
        ->groupBy('village_id')
        // ->orderBy('jumlah_tps_pemilih', 'desc')
        ->paginate('10');
        // $data['kecamatanTerbanyak'] = Pilihan::select('district_id', \DB::raw('COUNT(DISTINCT tps_pemilih_id) as jumlah_tps_pemilih'))
        // ->groupBy('district_id')
        // ->orderBy('jumlah_tps_pemilih','desc')
        // ->paginate('10');

        return view('livewire.dashboard', $data);
    }
}
