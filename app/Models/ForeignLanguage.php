<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignLanguage extends Model
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
}
