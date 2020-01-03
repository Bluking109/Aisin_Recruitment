<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
	const FORM_HIGH_SCHOOL = '1';
	const FORM_DIPLOMA = '2';
    const FORM_BACHELOR = '3';

    /**
     * field that can be fill
     * @var array
     */
    protected $fillable = [
    	'name',
    	'form_type',
        'hierarchy'
    ];

    /**
     * Fungsi untuk mengetahui apakah formulir yang di gunakan harus punya sma
     * @return boolean
     */
    public function isHighSchoolForm()
    {
    	return $this->form_type == self::FORM_HIGH_SCHOOL;
    }

    /**
     * Fungsi untuk mengetahui apakah formulir yang di gunakan harus punya D3
     * @return boolean
     */
    public function isDiplomaForm()
    {
    	return $this->form_type == self::FORM_DIPLOMA;
    }

    /**
     * Fungsi untuk mengetahui apakah formulir yang digunakan harus punya S1
     * @return boolean
     */
    public function isBachelorForm()
    {
        return $this->form_type == self::FORM_BACHELOR;
    }
}