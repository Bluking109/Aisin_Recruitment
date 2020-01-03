<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * relations district
     * @return Illuminate\Database\Eloquent\Model
     */
    public function districts()
    {
    	$this->hasMany('App\Models\District', 'province_id');
    }

}
