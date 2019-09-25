<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = ['updated_at'];

    /**
     * Scope a query to only include active data.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', '1');
    }

    /**
     * Accessor images
     *
     * @param string $value
     * @return  array
     */
    public function getImagesAttribute($value)
    {
        $images = [];
        if (is_string($value)) {
            $images = json_decode($value, true);
        }

        return $this->attributes['images'] = $images;
    }
}
