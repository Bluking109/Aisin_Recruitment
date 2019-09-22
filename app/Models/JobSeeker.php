<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Yadahan\AuthenticationLog\AuthenticationLogable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class JobSeeker extends Authenticatable implements MustVerifyEmail
{
	use Notifiable, AuthenticationLogable;

	const STATUS_BLACKLIST = '1';
	const STATUS_UNBLACKLIST = '0';

    const GENDER_MAN = '1';
    const GENDER_WOMAN = '2';

    const RELIGION_ISLAM = '1';
    const RELIGION_HINDU = '2';
    const RELIGION_BUDHA = '3';
    const RELIGION_KATOLIK = '4';
    const RELIGION_PROTESTAN = '5';

	/**
	 * Mass assignment guarded
	 * @var array
	 */
    protected $guarded = ['updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Education level relationship many to one
     * @return Illuminate\Database\Eloquent\Model
     */
    public function educationLevel()
    {
    	return $this->belongsTo('App\Models\EducationLevel', 'education_level_id');
    }

    /**
     * village relation
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function addressVillage()
    {
        return $this->belongsTo('App\Models\Village', 'address_village_id');
    }

    /**
     * village relation
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function domicileVillage()
    {
        return $this->belongsTo('App\Models\Village', 'domicile_village_id');
    }

    /**
     * Scope a query to only blacklist jobseekers
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBlacklist($query)
    {
        return $query->where('is_blacklist', self::STATUS_BLACKLIST);
    }

    /**
     * Scope a query to only unblacklist jobseekers
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnBlacklist($query)
    {
        return $query->where('is_blacklist', self::STATUS_UNBLACKLIST);
    }

    /**
     * Mutator date of birth
     * @param string $value
     */
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = date('Y-m-d', strtotime($value));
    }

    /**
     * Accessor driving licences
     *
     * @param string $value
     * @return  array
     */
    public function getDrivingLicencesAttribute($value)
    {
        $licences = json_decode($value, true);
        $returnData = [];
        if ($licences) {
            foreach ($licences as $key => $value) {
                $returnData[$value['type']] = $value['value'];
            }
        }

        return $this->attributes['driving_licences'] = $returnData;
    }

    /**
     * formal education relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function formalEducations()
    {
        return $this->hasMany('App\Models\FormalEducation', 'job_seeker_id');
    }

    /**
     * non formal education relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function nonFormalEducations()
    {
        return $this->hasMany('App\Models\NonFormalEducation', 'job_seeker_id');
    }

    /**
     * education detail relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function educationDetail()
    {
        return $this->hasOne('App\Models\EducationDetail', 'job_seeker_id');
    }

    /**
     * language relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function foreignLanguages()
    {
        return $this->hasMany('App\Models\ForeignLanguage', 'job_seeker_id');
    }

    /**
     * marital status relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function maritalStatus()
    {
        return $this->hasOne('App\Models\MaritalStatus', 'job_seeker_id');
    }

    /**
     * partner relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function partner()
    {
        return $this->hasOne('App\Models\Partner', 'job_seeker_id');
    }

    /**
     * childs relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function children()
    {
        return $this->hasMany('App\Models\Child', 'job_seeker_id');
    }

    /**
     * parents relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function parents()
    {
        return $this->hasMany('App\Models\BiologicalParent', 'job_seeker_id');
    }

    /**
     * siblings relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function siblings()
    {
        return $this->hasMany('App\Models\Sibling', 'job_seeker_id');
    }

    /**
     * working experience relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function workExperiences()
    {
        return $this->hasMany('App\Models\WorkExperience', 'job_seeker_id');
    }

    /**
     * working experience detail relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function workExperienceDetail()
    {
        return $this->hasOne('App\Models\WorkExperienceDetail', 'job_seeker_id');
    }

    /**
     * interest concept relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function interestConcept()
    {
        return $this->hasOne('App\Models\InterestConcept', 'job_seeker_id');
    }
}
