<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Tidak menggunakan nama class Parent (Orang Tua) karena class parent sudah di reserved
class BiologicalParent extends Model
{
	const IS_FATHER = '1';
	const IS_MOTHER = '2';

    protected $table = 'parents';

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
     * Scope a query get father
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFather($query)
    {
        return $query->where('is', self::IS_FATHER);
    }

    /**
     * Scope a query get mother
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMother($query)
    {
        return $query->where('is', self::IS_MOTHER);
    }

    /**
     * Mutator date of birth
     * @param string $value
     */
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = date('Y-m-d', strtotime($value));
    }
}
