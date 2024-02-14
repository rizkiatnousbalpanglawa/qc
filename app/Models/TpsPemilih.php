<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpsPemilih extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function tps()
    {
        return $this->belongsTo(Tps::class,'tps_id','id');
    }

    public function pilihan()
    {
        return $this->hasMany(Pilihan::class,'tps_pemilih_id','id');
    }

    public function status()
    {
        return $this->hasMany(Status::class,'tps_pemilih_id','id');
    }

    public function komunitasAnggota()
    {
        return $this->hasMany(KomunitasAnggota::class,'tps_pemilih_id','id');
    }
}
