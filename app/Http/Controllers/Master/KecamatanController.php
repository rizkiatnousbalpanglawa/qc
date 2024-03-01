<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $data['kecamatan'] = District::whereHas('regency.province', function ($query) {
            $query->where('name', 'SULAWESI SELATAN');
        })->get();
        $data['kabupaten'] = Regency::get();
        return view('master.kecamatan', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'regency_id' => 'required',
            'name' => 'required'
        ]);
        District::create($validated);
        toast('Data berhasil tersimpan', 'success');
        return back();
    }
}
