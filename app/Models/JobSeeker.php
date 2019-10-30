<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Yadahan\AuthenticationLog\AuthenticationLogable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\BiologicalParent;

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
     * Append attribute
     * @var array
     */
    protected $appends = ['gender_label', 'religion_label'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Global scope (seperti soft delete laravel)
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_blacklist', self::STATUS_UNBLACKLIST);
        });
    }

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
     * Get All Data blacklist or unblacklist
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllData($query)
    {
        return $query->withoutGlobalScope('active');
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
        if(is_string($value)) {
            $licences = json_decode($value, true);
            $returnData = [];
            if ($licences) {
                foreach ($licences as $key => $value) {
                    $returnData[$value['type']] = $value['value'];
                }
            }

            return $this->attributes['driving_licences'] = $returnData;
        }

        return $this->attributes['driving_licences'] = $value;
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

    /**
     * Document relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function document()
    {
        return $this->hasOne('App\Models\Document', 'job_seeker_id');
    }

    /**
     * Friend relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function friends()
    {
        return $this->hasMany('App\Models\Friend', 'job_seeker_id');
    }

    /**
     * Organization relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function organizations()
    {
        return $this->hasMany('App\Models\Organization', 'job_seeker_id');
    }

    /**
     * Other relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function other()
    {
        return $this->hasOne('App\Models\Other', 'job_seeker_id');
    }

    /**
     * Disease relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function diseases()
    {
        return $this->hasMany('App\Models\Disease', 'job_seeker_id');
    }

    /**
     * Other recruitments relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function otherRecruitments()
    {
        return $this->hasMany('App\Models\OtherRecruitment', 'job_seeker_id');
    }

    /**
     * Acessor gender label
     * @return string
     */
    public function getGenderLabelAttribute()
    {
        $gender = $this->gender;

        switch ($gender) {
            case self::GENDER_MAN:
                return 'Male';
                break;

            case self::GENDER_WOMAN:
                return 'Female';
                break;

            default:
                return null;
                break;
        }
    }

    /**
     * Acessor religion label
     * @return string
     */
    public function getReligionLabelAttribute()
    {
        $religion = $this->religion;

        switch ($religion) {
            case self::RELIGION_ISLAM:
                return 'Islam';
                break;

            case self::RELIGION_PROTESTAN:
                return 'Protestan';
                break;

            case self::RELIGION_KATOLIK:
                return 'Katolik';
                break;

            case self::RELIGION_HINDU:
                return 'Hindu';
                break;

            case self::RELIGION_BUDHA:
                return 'Budha';
                break;

            default:
                return null;
                break;
        }
    }

    /**
     * Accessor father
     */
    public function getFatherAttribute()
    {
        return $this->parents()->where('is', BiologicalParent::IS_FATHER)->first();
    }

    /**
     * Accessor mother
     */
    public function getMotherAttribute()
    {
        return $this->parents()->where('is', BiologicalParent::IS_MOTHER)->first();
    }

    /**
     * Relation has many applications
     */
    public function applications()
    {
        return $this->hasMany('App\Models\JobApplication', 'job_seeker_id');
    }

    /**
     * acessor age
     */
    public function getAgeAttribute()
    {
        return date_diff(date_create($this->date_of_birth), date_create('today'))->y;
    }

    /**
     * Check can apply or not
     */
    public function scopeCanApply()
    {
        if ($this->identity_number &&
            $this->formalEducations->count() &&
            $this->maritalStatus &&
            $this->parents->count() &&
            $this->interestConcept &&
            $this->document &&
            $this->other
        ) {
            return true;
        }

        return false;
    }
}
