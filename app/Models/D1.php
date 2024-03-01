<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D1 extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function kabupaten()
    {
        return $this->belongsTo(Regency::class,'kabupaten_id','id');
    }
}
