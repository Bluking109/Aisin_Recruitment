<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    const GENDER_MALE = '1';
    const GENDER_FEMALE = '2';
    const GENDER_MALE_FEMALE = '3';

    /**
     * fillable mass assigment
     * @var $fillable
     */
    protected $fillable = [
    	'position_id',
    	'education_level_id',
    	'open_date',
    	'close_date',
    	'gender',
    	'min_gpa',
    	'descriptions',
    	'requirements',
        'image',
        'section_type',
        'section_id',
        'slug'
    ];

    /**
     * Append attribute
     */
    protected $appends = ['gender_label'];


    /**
     * get position description
     * @return Illuminate\Database\Eloquent\Model
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id');
    }

    /**
     * get education_level description
     * @return Illuminate\Database\Eloquent\Model
     */
    public function educationLevel()
    {
        return $this->belongsTo('App\Models\EducationLevel', 'education_level_id');
    }

    /**
     * Get the owning section model.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function section()
    {
        return $this->morphTo();
    }

    /**
     * Relation recruitment stage
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function stages()
    {
        return $this->belongsToMany('App\Models\RecruitmentStage', 'job_vacancy_stages', 'job_vacancy_id', 'recruitment_stage_id')->withPivot('order_index');
    }

    /**
     * Get recruitment process
     *
     * @return array
     */
    public static function getGender()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        $ids = [];

        foreach ($oClass->getConstants() as $key => $value) {
            if (explode('_', $key)[0] === 'GENDER') {
                $ids[] = $value;
            }
        }
        return $ids;
    }

    /**
     * Active job vacancy
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereRaw('? between open_date and close_date', [date('Y-m-d')]);
    }

    /**
     * Slug scope
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    /**
     * Acessor gender label
     * @return string
     */
    public function getGenderLabelAttribute()
    {
        $gender = $this->gender;

        switch ($gender) {
            case self::GENDER_MALE:
                return 'Laki - Laki';
                break;

            case self::GENDER_FEMALE:
                return 'Perempuan';
                break;

            case self::GENDER_MALE_FEMALE:
                return 'Laki - Laki / Perempuan';
                break;
            default:
                return 'Undifined';
                break;
        }
    }
}
