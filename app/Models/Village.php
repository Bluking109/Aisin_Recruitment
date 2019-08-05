<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sub_district_id'
    ];

    /**
     * Sub districts relation (One to many)
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function subDistrict()
    {
    	return $this->belongsTo('App\Models\SubDistrict', 'sub_district_id');
    }
}
