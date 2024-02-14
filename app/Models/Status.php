<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function dpt()
    {
        $this->belongsTo(TpsPemilih::class,'tps_pemilih_id','id');
    }
    public function tps()
    {
        $this->belongsTo(TpsPemilih::class,'tps_id','id');
    }
    public function regency()
    {
        $this->belongsTo(TpsPemilih::class,'regency_id','id');
    }
    public function disctrict()
    {
        $this->belongsTo(TpsPemilih::class,'district_id','id');
    }
    public function village()
    {
        $this->belongsTo(TpsPemilih::class,'village_id','id');
    }
    public function status()
    {
        $this->hasMany(Status::class,'pengusul_id','id');
    }
}
