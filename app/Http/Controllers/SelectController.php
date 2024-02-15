<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Partisipan;
use App\Models\Regency;
use App\Models\TpsPemilih;
use App\Models\Village;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function regency()
    {
        $data = Regency::whereHas('province', function ($query) {
            $query->where('name', 'SULAWESI SELATAN');
        })->where('name','LIKE','%'.request('q').'%')->paginate(9);

        return response()->json($data);
    }

    public function district($id)
    {
        $data = District::where('regency_id',$id)->where('name','LIKE','%'.request('q').'%')->orderBy('name')->paginate(10);

        return response()->json($data);
    }

    public function village($id)
    {
        if ($id==111) {
            $data = Village::where('name','LIKE','%'.request('q').'%')->orderBy('name')->paginate(10);

        }else {
            $data = Village::where('district_id',$id)->where('name','LIKE','%'.request('q').'%')->orderBy('name')->paginate(10);
        }
        return response()->json($data);
    }

    public function partisipan()
    {
        $data = TpsPemilih::where('nama','LIKE','%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }

    public function allDistrict()
    {
        $data = District::where('name','LIKE','%'.request('q').'%')->orderBy('name')->paginate(10);

        return response()->json($data);
    }
}
