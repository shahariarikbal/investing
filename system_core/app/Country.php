<?php

namespace App;

use App\Broker;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function parameter()
    {
        return $this->hasOne(CountryParameter ::class, 'country_code', 'code');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_code', 'code');
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'country_code', 'code');
    }
}
