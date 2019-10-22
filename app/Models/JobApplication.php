<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
	const STATUS_DRAFT = '0';
	const STATUS_IN_PROCESS = '1';
	const STATUS_ACCEPTED = '2';
	const STATUS_REJECT = '3';

	protected $guarded = ['updated_at'];

    /**
     * job seeker relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function jobSeeker()
    {
        return $this->belongsTo('App\Models\JobSeeker', 'job_seeker_id');
    }

    /**
     * job vacancy relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function jobVacancy()
    {
        return $this->belongsTo('App\Models\jobVacancy', 'job_vacancy_id');
    }

    /**
     * job application stage relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function jobApplicationStages()
    {
        return $this->belongsTo('App\Models\JobApplicationStage', 'job_application_id');
    }
}
