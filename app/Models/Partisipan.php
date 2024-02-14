<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partisipan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function village()
    {
        return $this->belongsTo(Village::class,'village_id');
    }

    public function pendukung()
    {
        return $this->hasMany(Pendukung::class,'nik','nik');
    }
    
}
