<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $data['provinsi'] = Province::where('name','SULAWESI SELATAN')->get();
        return view('master.provinsi', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_prov' => 'required',
            'provinsi' => 'required'
        ]);
        Province::create($validated);
        toast('Data berhasil tersimpan', 'success');
        return back();
    }

    public function delete(Province $id)
    {
        $id->delete();

        toast('Data berhasil terhapus','success');
        return back();
    }
}
