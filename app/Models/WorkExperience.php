<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
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
     * Mutator join date
     * @param string $value
     */
    public function setJoinDateAttribute($value)
    {
        $this->attributes['join_date'] = date('Y-m-d', strtotime($value));
    }

    /**
     * Mutator end date
     * @param string $value
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = date('Y-m-d', strtotime($value));
    }
}
