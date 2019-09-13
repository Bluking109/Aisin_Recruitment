<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = [
    	'position_id',
    	'education_level_id',
    	'open_date',
    	'close_date',
    	'gender',
    	'min_gpa',
    	'descriptions',
    	'requirements'
    ];


    /**
     * get position description
     * @return [type] [description]
     */
    public function position() {
        return $this->hasOne('App\Models\Position', 'id', 'position_id');
    }

    /**
     * get education_level description
     * @return [type] [description]
     */
    public function education_level() {
        return $this->hasOne('App\Models\EducationLevel', 'id', 'education_level_id');
    }
}
