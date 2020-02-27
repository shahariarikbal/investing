<?php

namespace App\Traits;

trait Taggable
{
    /******************** */
    /*** RELATIONSHIP *** */
    /******************** */

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
