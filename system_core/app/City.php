<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class, 'code', 'country_code');
    }

    public function profile()
    {
        return $this->hasMany(Profile::class, 'city_id', 'id');
    }
}
