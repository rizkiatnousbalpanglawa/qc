<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistik extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function village()
    {
        return $this->belongsTo(Village::class,'village_id','id');
    }

    public function atribut()
    {
        return $this->belongsTo(Atribut::class,'atribut_id','id');
    }
}
