<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'district_id'
    ];

    /**
     * Province relation (Many to one)
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function district()
    {
    	return $this->belongsTo('App\Models\District', 'district_id');
    }

    /**
     * Sub districts relation (One to many)
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function villages()
    {
    	return $this->hasMany('App\Models\Village', 'sub_district_id');
    }
}
