<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Village;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $data['kelurahan'] = Village::whereHas('district.regency.province', function ($query) {
            $query->where('name', 'SULAWESI SELATAN');
        })->get();
        return view('master.kelurahan', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kel' => 'required',
            'kelurahan' => 'required'
        ]);
        Kelurahan::create($validated);
        toast('Data berhasil tersimpan', 'success');
        return back();
    }
}
