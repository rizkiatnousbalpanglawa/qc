<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuaraCaleg extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function caleg()
    {
        return $this->belongsTo(Caleg::class,'caleg_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class,'village_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
}
