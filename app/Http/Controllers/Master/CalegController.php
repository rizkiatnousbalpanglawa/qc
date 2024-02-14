<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Caleg;
use App\Models\Parpol;
use Illuminate\Http\Request;

class CalegController extends Controller
{
    public function index()
    {
        $data['caleg'] = Caleg::with(['parpol'])->get();
        return view('master.caleg.index',$data);
    }

    public function create()
    {
        $data['caleg_is_active'] = "mm-active";
        $data['caleg'] = Caleg::get();
        $data['parpol'] = Parpol::get();
        return view('master.caleg.create',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nomor_urut' => 'required',
            'status' => 'required',
            'parpol_id' => 'required',
            'dapil' => ''
        ]);
        Caleg::create($validated);

        toast('Data Berhasil Disimpan!','success');
        return redirect('caleg');
    }

    public function edit(Caleg $caleg)
    {
        $data['caleg_is_active'] = "mm-active";
        $data['caleg'] = $caleg;
        $data['parpol'] = Parpol::get();
        return view('master.caleg.edit',$data);
    }

    public function update(Request $request, Caleg $caleg)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nomor_urut' => 'required',
            'status' => 'required',
            'parpol_id' => 'required',
            'dapil' => ''
        ]);

        $caleg->update($validated);

        toast('Data Berhasil Diubah!','success');
        return redirect('caleg');
    }
}
