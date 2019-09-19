<?php

namespace App\Traits;

trait FilterString
{
    /**
     * Fungsi untuk menghilangkan multi space
     *
     * @param  Array  $data
     * @return Array
     */
    protected function filterSpace(Array $data) : array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->filterSpace($value);
            } elseif (is_string($value)) {
                $data[$key] = trim(preg_replace('!\s+!', ' ', $value));
            }
        }

        return $data;
    }

    /**
     * Fungsi untuk menghilangkan comma
     *
     * @param  Array  $data
     * @return Array
     */
    protected function removeComma($string) : string
    {
        return str_replace(',', '', $string);
    }
}