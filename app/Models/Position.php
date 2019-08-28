<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
    	'code',
    	'name',
    	'section_id'
    ];


    /**
     * [section description]
     * @return [type] [description]
     */
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
}
