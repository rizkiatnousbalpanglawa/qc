<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomunitasAnggota extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $hidden=['komunitas_id'];

    public function tpsPemilih()
    {
        return $this->belongsTo(TpsPemilih::class,'tps_pemilih_id');
    }

    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class,'komunitas_id','id');
    }
}
