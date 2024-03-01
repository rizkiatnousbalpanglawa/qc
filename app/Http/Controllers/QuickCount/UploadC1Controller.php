<?php

namespace App\Http\Controllers\QuickCount;

use App\Http\Controllers\Controller;
use App\Models\Caleg;
use App\Models\Parpol;
use App\Models\Saksi;
use App\Models\Status;
use App\Models\SuaraCaleg;
use App\Models\SuaraParpol;
use App\Models\Tps;
use App\Models\UploadC1;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UploadC1Controller extends Controller
{
    public function index()
    {
        return view('quick-count.index');
    }

    public function create()
    {
        return view('quick-count.create');
    }

    public function saksi($stat, Tps $tps)
    {
        $data['upload_c1_is_active'] = 'mm-active';
        // if (!Gate::check('admin') && !Gate::check('tim_data')) {
        //     abort(401);
        // }
        $data['tps'] = $tps;
        $data['stat'] = $stat;
        return view('quick-count.saksi', $data);
    }

    public function showTps(Request $request)
    {
        $data['upload_c1_is_active'] = 'mm-active';
        // if (!Gate::check('admin') && !Gate::check('tim_data')) {
        //     abort(401);
        // }
        // $data['saksi'] = $saksi;
        $query = Tps::with(['district', 'regency']);

        if ($request->village_id) {
            $query->whereHas('village', function ($query) use ($request) {
                $query->where('id', $request->village_id);
            });
        }

        $data['tps'] = $query->limit(15)->orderBy('district_id')->orderBy('village_id')->orderBy('nomor_tps')->with('upload')->get();
        $data['kelurahan'] = Village::with('district')->get();

        return view('quick-count.showTps', $data);
    }

    public function form($status, Tps $tps)
    {
        $data['upload_c1_is_active'] = 'mm-active';
        // if (!Gate::check('admin') && !Gate::check('tim_data')) {
        //     abort(401);
        // }

        // $data['saksi'] = $saksi;
        $data['tps'] = $tps;
        $data['tps']->status_caleg = $status;
        $data['parpol'] = Parpol::get();
        $data['caleg'] = Caleg::where('status', $status)->get();
        return view('quick-count.form', $data);
    }

    public function edit($status, Tps $tps, Request $request)
    {
        $data['upload_c1_is_active'] = 'mm-active';
        // if (!Gate::check('admin') && !Gate::check('tim_data')) {
        //     abort(401);
        // }

        $data['tps'] = $tps;
        $data['parpol'] = SuaraParpol::where('status', $status)->where('tps_id', $tps->id)->with(['parpol'])->get();
        $data['caleg'] = SuaraCaleg::where('status', $status)->where('tps_id', $tps->id)->with(['caleg'])->get();
        $data['c1'] = UploadC1::where('status', $status)->where('tps_id', $tps->id)->first();
        return view('quick-count.edit', $data);
    }

    public function update($status, Tps $tps, Request $request)
    {
        $validated = $request->validate([
            'lampiran_c1' => 'image|file|max:1024',
            'lampiran_plano' => 'image|file|max:1024',
            'lampiran_lokasi' => 'image|file|max:1024',
            'suara_sah' => '',
            'suara_tidak_sah' => '',
            'jumlah_pemilih' => '',
        ]);
        $kode = $request->kode;
        $form['user_id'] = auth()->user()->id;
        $form['regency_id'] = $tps->regency_id;
        $form['district_id'] = $tps->district_id;
        $form['village_id'] = $tps->village_id;
        $form['tps_id'] = $tps->id;
        $form['kode'] = $kode;
        $form['status'] = $status;
        $form['suara_sah'] = $validated['suara_sah'];
        $form['suara_tidak_sah'] = $validated['suara_tidak_sah'];
        $form['jumlah_pemilih'] = $validated['jumlah_pemilih'];

        $cekc1 = UploadC1::where('kode', $kode)->where('status', $status)->first();
        if ($request->has('lampiran_c1')) {
            $form['lampiran_c1'] = $request->file('lampiran_c1')->store('lampiran');
        }
        if ($request->has('lampiran_plano')) {
            $form['lampiran_plano'] = $request->file('lampiran_plano')->store('lampiran');
        }
        if ($request->has('lampiran_lokasi')) {
            $form['lampiran_lokasi'] = $request->file('lampiran_lokasi')->store('lampiran');
        }

        $cekc1->update($form);
        SuaraCaleg::where('kode', $kode)->delete();

        $caleg = Caleg::where('status', $status)->get();
        foreach ($caleg as $value) {
            $suaraCaleg['user_id'] = auth()->user()->id;
            $suaraCaleg['regency_id'] = $tps->regency_id;
            $suaraCaleg['district_id'] = $tps->district_id;
            $suaraCaleg['village_id'] = $tps->village_id;
            $suaraCaleg['tps_id'] = $tps->id;
            $suaraCaleg['kode'] = $kode;
            $suaraCaleg['status'] = $status;
            $suaraCaleg['caleg_id'] = $value->id;
            $suaraCaleg['jumlah_suara'] = $request->input('caleg_' . $value->id);
            SuaraCaleg::create($suaraCaleg);
        }


        try {
            $parpol = Parpol::get();
            SuaraParpol::where('kode', $kode)->delete();
            foreach ($parpol as $value) {
                $suaraParpol['user_id'] = auth()->user()->id;
                $suaraParpol['regency_id'] = $tps->regency_id;
                $suaraParpol['district_id'] = $tps->district_id;
                $suaraParpol['village_id'] = $tps->village_id;
                $suaraParpol['tps_id'] = $tps->id;
                $suaraParpol['kode'] = $kode;
                $suaraParpol['status'] = $status;
                $suaraParpol['parpol_id'] = $value->id;
                $suaraParpol['jumlah_suara'] = $request->input('parpol_' . $value->id);
                SuaraParpol::create($suaraParpol);
            }
        } catch (\Exception $e) {
            toast('Gagal menyimpan suara parpol', 'error');
            return back();
        }

        toast('Data berhasil disimpan!', 'success');
        return redirect('upload-c1/saksi/show?village_id='.$tps->village_id);
    }

    public function store($status, Tps $tps, Request $request)
    {
        $validated = $request->validate([
            'lampiran_c1' => 'image|file|max:1024',
            'lampiran_plano' => 'image|file|max:1024',
            'lampiran_lokasi' => 'image|file|max:1024',
            'suara_sah' => '',
            'suara_tidak_sah' => '',
            'jumlah_pemilih' => '',
        ]);
        $kode = uniqid('carli-');
        $form['user_id'] = auth()->user()->id;
        // $form['saksi_id'] = $saksi->id;
        $form['regency_id'] = $tps->regency_id;
        $form['district_id'] = $tps->district_id;
        $form['village_id'] = $tps->village_id;
        $form['tps_id'] = $tps->id;
        $form['kode'] = $kode;
        $form['status'] = $status;
        $form['suara_sah'] = $validated['suara_sah'];
        $form['suara_tidak_sah'] = $validated['suara_tidak_sah'];
        $form['jumlah_pemilih'] = $validated['jumlah_pemilih'];

        if ($request->has('lampiran_c1')) {
            $form['lampiran_c1'] = $request->file('lampiran_c1')->store('lampiran');
        }
        if ($request->has('lampiran_plano')) {
            $form['lampiran_plano'] = $request->file('lampiran_plano')->store('lampiran');
        }
        if ($request->has('lampiran_lokasi')) {
            $form['lampiran_lokasi'] = $request->file('lampiran_lokasi')->store('lampiran');
        }

        $cek = UploadC1::where('tps_id', $tps->id)->where('status', $status)->first();
        if ($cek) {
            return abort(401);
        }

        try {
            UploadC1::create($form);
        } catch (\Exception $e) {
            toast('Gagal menyimpan data uploadC1, ' . $e, 'error');
            return back();
        }

        try {
            $caleg = Caleg::where('status', $status)->get();
            foreach ($caleg as $value) {
                $suaraCaleg['user_id'] = auth()->user()->id;
                // $suaraCaleg['saksi_id'] = $saksi->id;
                $suaraCaleg['regency_id'] = $tps->regency_id;
                $suaraCaleg['district_id'] = $tps->district_id;
                $suaraCaleg['village_id'] = $tps->village_id;
                $suaraCaleg['tps_id'] = $tps->id;
                $suaraCaleg['kode'] = $kode;
                $suaraCaleg['status'] = $status;
                $suaraCaleg['caleg_id'] = $value->id;
                $suaraCaleg['jumlah_suara'] = $request->input('caleg_' . $value->id);
                SuaraCaleg::create($suaraCaleg);
            }
        } catch (\Exception $e) {
            toast('Gagal menyimpan suara caleg', 'error');
            return back();
        }

        try {
            $parpol = Parpol::get();
            foreach ($parpol as $value) {
                $suaraParpol['user_id'] = auth()->user()->id;
                // $suaraParpol['saksi_id'] = $saksi->id;
                $suaraParpol['regency_id'] = $tps->regency_id;
                $suaraParpol['district_id'] = $tps->district_id;
                $suaraParpol['village_id'] = $tps->village_id;
                $suaraParpol['tps_id'] = $tps->id;
                $suaraParpol['kode'] = $kode;
                $suaraParpol['status'] = $status;
                $suaraParpol['parpol_id'] = $value->id;
                $suaraParpol['jumlah_suara'] = $request->input('parpol_' . $value->id);
                SuaraParpol::create($suaraParpol);
            }
        } catch (\Exception $e) {
            toast('Gagal menyimpan suara parpol', 'error');
            return back();
        }

        toast('Data berhasil disimpan!', 'success');
        return redirect('upload-c1/saksi/show?village_id='.$tps->village_id);
    }

    public function delete(Request $request)
    {
        if ($request->hapus == 'esr') {
            SuaraCaleg::where('tps_id',$request->tps_id)->where('status',1)->delete();
            UploadC1::where('tps_id',$request->tps_id)->where('status',1)->delete();
            SuaraParpol::where('tps_id',$request->tps_id)->where('status',1)->delete();
        } elseif ($request->hapus == 'yrk') {
            SuaraCaleg::where('tps_id',$request->tps_id)->where('status',2)->delete();
            UploadC1::where('tps_id',$request->tps_id)->where('status',2)->delete();
            SuaraParpol::where('tps_id',$request->tps_id)->where('status',2)->delete();
        }
        toast('Data berhasil dihapus!', 'success');
        return back();
    }
}
