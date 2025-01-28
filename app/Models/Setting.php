<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use LogsActivity;

    /**
     * field that can be fill
     * @var array
     */
    protected $fillable = [
    	'name',
    	'display_name',
    	'description',
    	'value',
    	'type',
    ];

    public function isActive()
    {
    	if ($this->isActive == 1) {
    		return true;
    	}

    	return false;
    }
}
