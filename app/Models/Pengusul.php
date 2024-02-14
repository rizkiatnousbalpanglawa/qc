<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengusul extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function pilihan()
    {
       return $this->hasMany(Pilihan::class);
    }

    public function status()
    {
       return $this->belongsTo(Status::class,'pengusul_id','id');
    }
}
