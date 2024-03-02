<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuaraParpol extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function parpol()
    {
        return $this->belongsTo(Parpol::class,'parpol_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class,'village_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class,'regency_id');
    }

    public function lampiran()
    {
        return $this->hasMany(UploadC1::class,'kode','kode');
    }

    public function tps()
    {
        return $this->belongsTo(Tps::class,'tps_id');
    }
}
