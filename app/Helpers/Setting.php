<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\Setting as Model;

class Setting
{
    /**
     * @param string $name Name of setting
     * @return boolean
     */
    public static function isActive($name)
    {
    	if ($setting = Model::where('name', $name)->first()) {
    		if ($setting->isActive()) {
    			return true;
    		}
    	}

        return false;
    }

    /**
     * @param string
     * @return string
     */
    public static function getValue($name, $default = '')
    {
        $setting = Model::where('name', $name)->first();

        if ($setting) {
        	return $setting->value;
        }

        return $default;
    }

    /**
     * Get all data setting
     * @return eloquent model
     */
    public static function getAll()
    {
        $settings = Model::all();

        return $settings;
    }
}