<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $guarded = ['updated_at'];

    /**
     * formal educations relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function formalEducations()
    {
    	return $this->hasMany('App\Models\FormalEducation', 'major_id');
    }
}
