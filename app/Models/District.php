<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\DistrictTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regency;
use App\Models\Village;

/**
 * District Model.
 */
class District extends Model
{
    use DistrictTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'districts';

    public $timestamps = false;
    protected $fillable=['id','regency_id','name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'regency_id'
    ];

    /**
     * District belongs to Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    /**
     * District has many villages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function tps()
    {
        return $this->hasMany(Tps::class,'district_id','id');
    }

    public function pilihan()
    {
        return $this->hasMany(Pilihan::class);
    }
}
