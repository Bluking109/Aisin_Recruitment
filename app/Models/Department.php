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

    /**
     * Get all of the post's vacancies.
     */
    public function jobVacancies()
    {
        return $this->morphMany('App\Models\JobVacancy', 'section');
    }
}
