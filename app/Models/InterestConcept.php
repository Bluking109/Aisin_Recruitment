<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterestConcept extends Model
{
    const PLACE_OUTSIDE_YES = '1';
    const PLACE_OUTSIDE_NO = '0';

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
     * Mutator date of birth
     * @param string $value
     */
    public function setJoinDateAttribute($value)
    {
        $this->attributes['join_date'] = date('Y-m-d', strtotime($value));
    }

    /**
     * Acessor religion label
     * @return string
     */
    public function getPlaceOutsideLabelAttribute()
    {
        $place = $this->place_outside;

        switch ($place) {
            case self::PLACE_OUTSIDE_YES:
                return 'Yes';
                break;

            case self::PLACE_OUTSIDE_NO:
                return 'No';
                break;

            default:
                return null;
                break;
        }
    }
}
