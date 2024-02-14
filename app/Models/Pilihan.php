<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilihan extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function dpt()
    {
       return $this->belongsTo(TpsPemilih::class,'tps_pemilih_id','id');
    }
    public function tps()
    {
       return $this->belongsTo(Tps::class,'tps_id','id');
    }
    public function regency()
    {
       return $this->belongsTo(Regency::class,'regency_id','id');
    }
    public function district()
    {
       return $this->belongsTo(District::class,'district_id','id');
    }
    public function village()
    {
       return $this->belongsTo(Village::class,'village_id','id');
    }

    public function pengusul()
    {
       return $this->belongsTo(Pengusul::class,'pengusul_id','id');
    }

    public function tpsPemilih()
    {
       return $this->belongsTo(TpsPemilih::class,'tps_pemilih_id');
    }
  
}
