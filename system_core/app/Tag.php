<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function analyses()
    {
        return $this->morphedByMany('App\Analysis', 'taggable');
    }

    public function blogs()
    {
        return $this->morphedByMany('App\Blog', 'taggable');
    }
}
