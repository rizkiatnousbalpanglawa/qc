<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\VillageTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

/**
 * Village Model.
 */
class Village extends Model
{
    use VillageTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'villages';

    public $timestamps = false;
    protected $fillable=['id','district_id','name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'district_id'
    ];

	/**
     * Village belongs to District.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Village has Many to Partisipan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partisipan()
    {
        return $this->hasMany(Partisipan::class);
    }

    /**
     * Village has Many to tps.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tps()
    {
        return $this->hasMany(Tps::class);
    }

    public function pilihan()
    {
        return $this->hasMany(Pilihan::class);
    }
}
