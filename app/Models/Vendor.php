<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * field that can be fill
     * @var array
     */
    protected $fillable = [
    	'name',
    	'contact',
    	'address',
    ];
}
