<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherRecruitment extends Model
{
	const PROCESS_ADMINISTRASI = '1';
	const PROCESS_PSIKOTEST = '2';
	const PROCESS_INTERVIEW_HRD = '3';
	const PROCESS_INTERVIEW_USER = '4';
	const PROCESS_MCU = '5';
	const PROCESS_OTHER = '6';

	const STATUS_IN_PROGRESS = '1';
	const STATUS_ACCEPTED = '2';
	const STATUS_REJECTED = '3';

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
     * Get recruitment process
     *
     * @return array
     */
    public static function getProcessId()
    {
    	$oClass = new \ReflectionClass(__CLASS__);
    	$ids = [];

    	foreach ($oClass->getConstants() as $key => $value) {
    		if (explode('_', $key)[0] === 'PROCESS') {
    			$ids[] = $value;
    		}
    	}
        return $ids;
    }

    /**
     * Get recruitment process
     *
     * @return array
     */
    public static function getProcessLabel()
    {
    	return [
    		self::PROCESS_ADMINISTRASI => 'Administrasi',
    		self::PROCESS_PSIKOTEST => 'Psikotest',
    		self::PROCESS_INTERVIEW_HRD => 'Interview HRD',
    		self::PROCESS_INTERVIEW_USER => 'Interview User',
    		self::PROCESS_MCU => 'MCU',
    		self::PROCESS_OTHER => 'Lain-Lain'
    	];
    }

    /**
     * Get recruitment process
     *
     * @return array
     */
    public static function geSatusId()
    {
    	$oClass = new \ReflectionClass(__CLASS__);
    	$ids = [];

    	foreach ($oClass->getConstants() as $key => $value) {
    		if (explode('_', $key)[0] === 'STATUS') {
    			$ids[] = $value;
    		}
    	}
        return $ids;
    }

    /**
     * Get recruitment process
     *
     * @return array
     */
    public static function getStatusLabel()
    {
    	return [
    		self::STATUS_IN_PROGRESS => 'Dalam Proses',
    		self::STATUS_ACCEPTED => 'Diterima',
    		self::STATUS_REJECTED => 'Ditolak'
    	];
    }

    /**
     * Mutator date
     * @param string $value
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
    }
}
