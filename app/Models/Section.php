<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * field that can be fill
     * @var array
     */
    protected $fillable = [
    	'code',
    	'name',
    	'pic',
    	'pic_email',
    	'department_id'
    ];

    /**
     * [department description]
     * @return Object [description]
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    /**
     * Get all of the post's vacancies.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function jobVacancies()
    {
        return $this->morphMany('App\Models\JobVacancy', 'section');
    }
}
