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

    public function saksi($stat, Tps $tps)
    {
        $data['upload_c1_is_active'] = 'mm-active';
        if (!Gate::check('admin') && !Gate::check('tim_data')) {
            abort(401);
        }
        $data['tps'] = $tps;
        $data['stat'] = $stat;
        return view('quick-count.saksi', $data);
    }

    public function showTps(Request $request)
    {
        $data['upload_c1_is_active'] = 'mm-active';
        if (!Gate::check('admin') && !Gate::check('tim_data')) {
            abort(401);
        }
        // $data['saksi'] = $saksi;
        $query = Tps::with(['district', 'regency']);

        if ($request->village_id) {
            $query->whereHas('village', function ($query) use ($request) {
                $query->where('id', $request->village_id);
            });
        }

        $data['tps'] = $query->limit(10)->orderBy('district_id')->orderBy('village_id')->orderBy('nomor_tps')->with('upload')->get();
        $data['kelurahan'] = Village::with('district')->get();

        return view('quick-count.showTps', $data);
    }

    public function form($status, Tps $tps)
    {
        $data['upload_c1_is_active'] = 'mm-active';
        if (!Gate::check('admin') && !Gate::check('tim_data')) {
            abort(401);
        }

        // $data['saksi'] = $saksi;
        $data['tps'] = $tps;
        $data['parpol'] = Parpol::get();
        $data['caleg'] = Caleg::where('status', $status)->get();
        return view('quick-count.form', $data);
    }

    public function edit($status, Tps $tps, Request $request)
    {

    }

    public function store($status, Tps $tps, Request $request)
    {
        $validatedData = $this->validateFormData($request);
        $kode = $this->generateUniqueCode();
        $form = $this->prepareFormData($status, $tps, $kode, $validatedData);
        $this->uploadFiles($request, $form);
    
        if ($this->isDuplicateEntry($status, $tps)) {
            return abort(401);
        }
    
        try {
            $this->storeCalegVotes($status, $tps, $kode, $request);
        } catch (\Exception $e) {
            toast('Gagal menyimpan suara caleg', 'error');
            return back();
        }
    
        try {
            $this->storeParpolVotes($status, $tps, $kode, $request);
        } catch (\Exception $e) {
            toast('Gagal menyimpan suara parpol', 'error');
            return back();
        }
    
        toast('Data berhasil disimpan!', 'success');
        return redirect('upload-c1/saksi/show/');
    }
    
    private function validateFormData(Request $request)
    {
        return $request->validate([
            'lampiran_c1' => 'image|file|max:1024',
            'lampiran_plano' => 'image|file|max:1024',
            'lampiran_lokasi' => 'image|file|max:1024',
            'suara_sah' => '',
            'suara_tidak_sah' => '',
            'jumlah_pemilih' => '',
        ]);
    }
    
    private function generateUniqueCode()
    {
        return uniqid('carli-');
    }
    
    private function prepareFormData($status, $tps, $kode, $validatedData)
    {
        $form['user_id'] = auth()->user()->id;
        $form['regency_id'] = $tps->regency_id;
        $form['district_id'] = $tps->district_id;
        $form['village_id'] = $tps->village_id;
        $form['tps_id'] = $tps->id;
        $form['kode'] = $kode;
        $form['status'] = $status;
        $form['suara_sah'] = $validatedData['suara_sah'];
        $form['suara_tidak_sah'] = $validatedData['suara_tidak_sah'];
        $form['jumlah_pemilih'] = $validatedData['jumlah_pemilih'];
        return $form;
    }
    
    private function uploadFiles(Request $request, &$form)
    {
        if ($request->has('lampiran_c1')) {
            $form['lampiran_c1'] = $request->file('lampiran_c1')->store('lampiran');
        }
        if ($request->has('lampiran_plano')) {
            $form['lampiran_plano'] = $request->file('lampiran_plano')->store('lampiran');
        }
        if ($request->has('lampiran_lokasi')) {
            $form['lampiran_lokasi'] = $request->file('lampiran_lokasi')->store('lampiran');
        }
    }
    
    private function isDuplicateEntry($status, $tps)
    {
        return UploadC1::where('tps_id', $tps->id)->where('status', $status)->exists();
    }
    
    private function storeCalegVotes($status, $tps, $kode, $request)
    {
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
    }
    
    private function storeParpolVotes($status, $tps, $kode, $request)
    {
        $parpol = Parpol::get();
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
    }
}
