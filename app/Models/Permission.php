<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * field that can be fill
     * @var array
     */
    protected $fillable = [
    	'name',
    	'guard_name',
    ];
}
