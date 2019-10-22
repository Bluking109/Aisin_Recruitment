<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplicationStage extends Model
{
	protected $guarded = ['updated_at'];

    /**
     * job seeker relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function stage()
    {
        return $this->belongsTo('App\Models\JobSeeker', 'job_seeker_id');
    }

    /**
     * job application relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function jobApplication()
    {
        return $this->belongsTo('App\Models\JobApplication', 'job_application_id');
    }

    /**
     * vendor relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }
}
