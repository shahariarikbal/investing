<?php

namespace App\Traits;

trait Interaction
{
    
    public function approvedComments() {
        return $this->comments()->where('approved', true);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function ratings()
    {
        return $this->morphMany('App\Rating', 'rateable');
    }
}
