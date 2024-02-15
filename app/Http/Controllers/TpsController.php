<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\TpsPemilih;
use Illuminate\Http\Request;

class TpsController extends Controller
{
    public function index(Request $request)
    {
       $data['tps_is_active'] = "mm-active";
    
       $query = Tps::with(['village']);

       if ($request->has('village_id')) {
           $query->where('village_id',$request->village_id);
       }

       $data['tps'] = $query->limit(15)->latest()->orderBy('district_id')->orderBy('village_id')->orderBy('nomor_tps')->get();
        return view('data.tps.index', $data);
    }

    public function create()
    {
        $data['tps_is_active'] = "mm-active";
        return view('data.tps.create',$data);
    }

    public function store(Request $request)
    {
        $validated= $this->validated($request);

        Tps::create($validated);

        alert('Berhasil','Data berhasil disimpan!','success');
        return redirect('tps');
    }

    public function show(Tps $tps)
    {
        $data['tps'] = $tps;
        $data['tps_is_active'] = "mm-active";
        // $data['pemilih'] = TpsPemilih::where('tps_id',$tps->id)->get();
        return view('data.tps.anggota.index',$data);
    }

    public function edit(Tps $tps)
    {
        $data['tps'] = $tps;
        $data['tps_is_active'] = "mm-active";

        return view('data.tps.edit',$data);
    }

    public function update(Request $request, Tps $tps)
    {
        $data = $this->validated($request);

        $tps->update($data);

        alert('Berhasil','Data berhasil diubah!','success');
        return redirect('tps');
    }

    public function destroy(Tps $tps, Request $request)
    {
        $tps_id = $request->tps_id;

        Tps::where('id',$tps_id)->delete();

        // TpsPemilih::where('tps_id',$tps_id)->delete();

        alert('Berhasil','Data berhasil dihapus!','success');
        return back();
    }

    public function validated($request)
    {
        $validated = $request->validate([
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'nomor_tps' => 'required',
            'target' => 'required'
        ]);

        return $validated;
    }
}
