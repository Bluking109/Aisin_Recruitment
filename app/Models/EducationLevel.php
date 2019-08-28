<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    /**
     * field that can be fill
     * @var array
     */
    protected $fillable = [
    	'name',
    	'form_type',
    ];
}
