<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * field that can be fill
     * @var array
     */
    protected $fillable = [
    	'code',
    	'name',
    	'pic',
    	'pic_email'
    ];
}
