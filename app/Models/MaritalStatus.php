<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    const GENDER_MAN = '1';
    const GENDER_WOMAN = '2';

    const STATUS_SINGLE = '1';
    const STATUS_ENGAGED = '2';
    const STATUS_MARRIED = '3';
    const STATUS_DIVORCED = '4';

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
     * Mutator date ktp
     * @param string $value
     */
    public function setDateKtpAttribute($value)
    {
        if ($value) {
            $this->attributes['date_ktp'] = date('Y-m-d', strtotime($value));
        } else {
            $this->attributes['date_ktp'] = $value;
        }
    }

    /**
     * Mutator date actual
     * @param string $value
     */
    public function setDateActualAttribute($value)
    {
        if ($value) {
            $this->attributes['date_actual'] = date('Y-m-d', strtotime($value));
        } else {
            $this->attributes['date_actual'] = $value;
        }
    }
}
