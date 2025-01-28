<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
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
     * Mutator start date
     * @param string $value
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = date('Y-m-d', strtotime($value));
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
