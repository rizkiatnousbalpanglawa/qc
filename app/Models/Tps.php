<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function village()
    {
        return $this->belongsTo(Village::class,'village_id','id');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_id','id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class,'regency_id','id');
    }

    public function dpt()
    {
        return $this->hasMany(TpsPemilih::class,'tps_id','id');
    }

    public function upload()
    {
        return $this->hasMany(UploadC1::class,'tps_id','id');
    }

    public function status()
    {
        return $this->hasMany(Status::class,'tps_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
