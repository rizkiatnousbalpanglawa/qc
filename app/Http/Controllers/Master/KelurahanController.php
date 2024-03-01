<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $data['kelurahan'] = Village::get();
        $data['kecamatan'] = District::get();
        return view('master.kelurahan', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'district_id' => 'required',
            'name' => 'required'
        ]);
        Kelurahan::create($validated);
        toast('Data berhasil tersimpan', 'success');
        return back();
    }
}
