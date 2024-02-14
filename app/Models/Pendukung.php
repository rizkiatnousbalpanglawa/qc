<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendukung extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function partisipan()
    {
        return $this->belongsTo(Partisipan::class,'nik','nik');
    }
}
