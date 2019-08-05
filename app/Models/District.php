<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'province_id'
    ];

    /**
     * Province relation (Many to one)
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function province()
    {
    	return $this->belongsTo('App\Models\Province', 'province_id');
    }

    /**
     * Sub districts relation (One to many)
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function subDistricts()
    {
    	return $this->hasMany('App\Models\SubDistrict', 'district_id');
    }
}
