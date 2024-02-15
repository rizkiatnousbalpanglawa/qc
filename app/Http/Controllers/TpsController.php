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

   
}
