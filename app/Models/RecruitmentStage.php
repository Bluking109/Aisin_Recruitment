<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentStage extends Model
{
    protected $guarded = ['updated_at'];

    /**
     * job application stage relationship
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    public function jobApplicationStages()
    {
        return $this->belongsTo('App\Models\JobApplicationStage', 'stage_id');
    }
}
