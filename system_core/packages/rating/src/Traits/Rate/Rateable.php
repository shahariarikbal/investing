<?php

namespace Nagy\LaravelRating\Traits\Rate;

use Nagy\LaravelRating\Models\Rating;

trait Rateable
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable')->orderBy('created_at', 'desc');
    }
    public function published_ratings()
    {
        return $this->ratings()->published();
    }

    public function ratingsAvg()
    {
        return $this->published_ratings()->avg('value');
    }

    public function ratingsCount()
    {
        return $this->published_ratings()->count();
    }

    public function getRatingsCountAttribute()
    {
        return $this->published_ratings->count();
    }

    public function getRatingAvgAttribute()
    {
        return $this->published_ratings->avg('value');
    }
}