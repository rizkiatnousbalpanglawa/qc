<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Parpol;
use Illuminate\Http\Request;

class ParpolController extends Controller
{
    public function index()
    {
        $data['parpol'] = Parpol::get();
        return view('master.parpol.index',$data);
    }

    public function create()
    {
        $data['parpol_is_active'] = "mm-active";
        $data['parpol'] = Parpol::get();
        return view('master.parpol.create',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);
        Parpol::create($validated);

        toast('Data Berhasil Disimpan!','success');
        return redirect('parpol');
    }

    public function edit(Parpol $parpol)
    {
        $data['parpol_is_active'] = "mm-active";
        $data['parpol'] = $parpol;
        return view('master.parpol.edit',$data);
    }

    public function update(Request $request, Parpol $parpol)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);

        $parpol->update($validated);

        toast('Data Berhasil Diubah!','success');
        return redirect('parpol');
    }
}
