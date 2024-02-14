<?php

namespace App\Http\Controllers;

use App\Models\Partisipan;
use App\Models\Pendukung;
use App\Models\Tps;
use App\Models\TpsPemilih;
use App\Models\Village;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dashboard_is_active'] = 'mm-active';
      
        return view('dashboard',$data);
    }
}
