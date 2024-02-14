<?php

namespace App\Http\Controllers;

use App\Models\Pengusul;
use App\Models\Pilihan;
use App\Models\Status;
use App\Models\Tps;
use Illuminate\Http\Request;

class PengusulController extends Controller
{
    public function index(Tps $tps,Pengusul $pengusul)
    {
        $data['tps'] = $tps;
        $data['pengusul'] = $pengusul;
        return view('data.tps.anggota.pengusul.index',$data);
    }

    // Master TPS
    // Master TPS

    public function masterPengusul()
    {
        $data['pengusul'] = Pengusul::get();
        return view('master.pengusul.index',$data);
    }
    public function masterPengusulEdit(Pengusul $pengusul)
    {
        $data['pengusul'] =$pengusul;
        return view('master.pengusul.edit',$data);
    }
    public function masterPengusulUpdate(Pengusul $pengusul,Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);

        $pengusul->update($validated);

        toast('Data Berhasil Diubah!','success');
        return redirect('master/pengusul');
    }

    public function delete(Request $request)
    {
       $pengusul = Pengusul::find($request->id);

       $pengusul->delete();

       Pilihan::where('pengusul_id',$request->id)->delete();
       Status::where('pengusul_id',$request->id)->delete();

       toast('Data berhasil dihapus!','success');

       return back();
        
    }
}
