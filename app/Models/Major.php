<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    const TYPE_HIGH_SCHOOL = '1';
    const TYPE_DIPLOMA = '2';

    protected $guarded = ['updated_at'];

    protected $appends = ['type_label'];

    /**
     * formal educations relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function formalEducations()
    {
    	return $this->hasMany('App\Models\FormalEducation', 'major_id');
    }

    /**
     * Relation job vacancy
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function jobVacancies()
    {
        return $this->belongsToMany('App\Models\JobVacancy', 'job_vacancy_majors', 'major_id', 'job_vacancy_id');
    }

    /**
     * Scope high school
     *
     * Get all high school major
     */
    public function scopeHighSchool()
    {
        return $this->where('type', self::TYPE_HIGH_SCHOOL);
    }

    /**
     * scope diploma up
     *
     * get all diploma, bachelor majors
     */
    public function diploma()
    {
        return $this->where('type', self::TYPE_DIPLOMA);
    }

    /**
     * accessor type label
     *
     * get label type accessor
     */
    public function getTypeLabelAttribute()
    {
        $type = $this->type;

        switch ($type) {
            case self::TYPE_HIGH_SCHOOL:
                return 'SMA / SMK';
                break;

            case self::TYPE_DIPLOMA:
                return 'D3 / S1 / S2';
                break;

            default:
                return 'Undifined';
                break;
        }
    }
}
