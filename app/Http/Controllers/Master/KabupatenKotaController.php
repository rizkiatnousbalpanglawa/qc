<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Regency;
use Illuminate\Http\Request;

class KabupatenKotaController extends Controller
{
    public function index()
    {
        $data['kab_kota'] = Regency::whereHas('province', function ($query) {
            $query->where('name', 'SULAWESI SELATAN');
        })->get();
    return view('master.kab_kota',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kab' => 'required',
            'kabupaten_kota' => 'required'
        ]);
        KabupatenKota::create($validated);
        toast('Data berhasil tersimpan','success');
        return back();
    }

    public function delete(Regency $id)
    {
        $id->delete();

        toast('Data berhasil terhapus','success');
        return back();
    }
    
}
