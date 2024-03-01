<?php

namespace App\Http\Controllers;

use App\Exports\CalegExport;
use App\Exports\DistrictExport;
use App\Exports\ParpolExport;
use App\Exports\RegencyExport;
use App\Exports\SuaraCalegExport;
use App\Exports\SuaraParpolExport;
use App\Exports\TpsExport;
use App\Exports\VillageExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function index()
    {
        return view('export.index');
    }
    public function post(Request $request)
    {

        switch ($request->nama_tabel) {
            case 'regency':
                return Excel::download(new RegencyExport, 'kabupaten.xlsx');
                break;
            case 'district':
                return Excel::download(new DistrictExport, 'kecamatan.xlsx');
                break;
            case 'village':
                return Excel::download(new VillageExport, 'kelurahan.xlsx');
                break;
            case 'tps':
                return Excel::download(new TpsExport, 'tps.xlsx');
                break;
            case 'caleg':
                return Excel::download(new CalegExport, 'caleg.xlsx');
                break;
            case 'parpol':
                return Excel::download(new ParpolExport, 'parpol.xlsx');
                break;
            case 'suara_caleg':
                return Excel::download(new SuaraCalegExport, 'suara_caleg.xlsx');
                break;
            case 'suara_parpol':
                return Excel::download(new SuaraParpolExport, 'suara_parpol.xlsx');

                break;

            default:
                # code...
                break;
        }
    }
}
