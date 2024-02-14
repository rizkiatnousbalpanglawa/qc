<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;

    protected $fillable = ['nama','keterangan'];

    public function anggota()
    {
        return $this->hasMany(KomunitasAnggota::class,'komunitas_id','id');
    }
}
