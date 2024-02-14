<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $data['kecamatan'] = District::whereHas('regency.province', function ($query) {
            $query->where('name', 'SULAWESI SELATAN');
        })->get();
        return view('master.kecamatan', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kec' => 'required',
            'kecamatan' => 'required'
        ]);
        Kecamatan::create($validated);
        toast('Data berhasil tersimpan', 'success');
        return back();
    }
}
