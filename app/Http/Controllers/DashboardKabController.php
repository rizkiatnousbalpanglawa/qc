<?php

namespace App\Http\Controllers;

use App\Models\D1;
use Illuminate\Http\Request;

class DashboardKabController extends Controller
{
    public function index()
    {
        $data['d1'] = D1::with('kabupaten')->get();
        return view('dashboard_kab',$data);
    }
}
