<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormalEducation extends Model
{
    const EDU_PRIMARY_SCHOOL = '1';
    const EDU_JUNIOR_HIGH_SCHOOL = '2';
    const EDU_SENIOR_HIGH_SCHOOL = '3';
    const EDU_DIPLOMA = '4';
    const EDU_BACHELOR = '5';
    const EDU_MASTER = '6';

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
     * Major relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function major()
    {
        return $this->belongsTo('App\Models\Major', 'major_id');
    }
}
