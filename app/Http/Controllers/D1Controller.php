<?php

namespace App\Http\Controllers;

use App\Models\D1;
use App\Models\Regency;
use Illuminate\Http\Request;

class D1Controller extends Controller
{
    public function index()
    {
        $data['kabupaten'] = Regency::get();
        $data['d1'] = D1::with('kabupaten')->get();
        $data['upload_d1_is_active'] = 'mm-active';
        return view('d1.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kabupaten_id' => 'required',
            'lampiran_c1' => '',
            'lampiran_plano' => '',
            'lampiran_lokasi' => '',
            'suara_esr' => 'required',
            'suara_nico' => 'required',
            'suara_rusdi' => 'required',
            'suara_aslam' => 'required',
            'suara_hayarna' => 'required',
            'suara_judas' => 'required',
            'suara_putri' => 'required',
            'suara_partai' => 'required',
            'suara_sah' => 'required',
            'suara_tidak_sah' => 'required',
            'jumlah_pemilih' => 'required',

        ]);

        if ($request->has('lampiran_c1')) {
            $validated['lampiran_c1'] = $request->file('lampiran_c1')->store('lampiran');
        }
        if ($request->has('lampiran_plano')) {
            $validated['lampiran_plano'] = $request->file('lampiran_plano')->store('lampiran');
        }
        if ($request->has('lampiran_lokasi')) {
            $validated['lampiran_lokasi'] = $request->file('lampiran_lokasi')->store('lampiran');
        }

        D1::create($validated);
        toast('Data telah ditambahkan!', 'success');
        return back();
    }

    public function edit(D1 $d1)
    {
        $data['kabupaten'] = Regency::get();
        $data['d1'] = $d1;
        return view('d1.edit', $data);
    }

    public function update(D1 $d1, Request $request)
    {
        $validated = $request->validate([
            'kabupaten_id' => 'required',
            'lampiran_c1' => '',
            'lampiran_plano' => '',
            'lampiran_lokasi' => '',
            'suara_esr' => 'required',
            'suara_nico' => 'required',
            'suara_rusdi' => 'required',
            'suara_aslam' => 'required',
            'suara_hayarna' => 'required',
            'suara_judas' => 'required',
            'suara_putri' => 'required',
            'suara_partai' => 'required',
            'suara_sah' => 'required',
            'suara_tidak_sah' => 'required',
            'jumlah_pemilih' => 'required',
        ]);

        if ($request->has('lampiran_c1')) {
            $validated['lampiran_c1'] = $request->file('lampiran_c1')->store('lampiran');
        }
        if ($request->has('lampiran_plano')) {
            $validated['lampiran_plano'] = $request->file('lampiran_plano')->store('lampiran');
        }
        if ($request->has('lampiran_lokasi')) {
            $validated['lampiran_lokasi'] = $request->file('lampiran_lokasi')->store('lampiran');
        }

        $d1->update($validated);
        toast('Data telah Diubah!', 'success');
        return redirect('d1');
    }

    public function delete(D1 $d1)
    {
        $d1->delete();

        toast('Data telah Dihapus!', 'success');
        return redirect('d1');
    }
}
