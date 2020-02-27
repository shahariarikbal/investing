<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $primaryKey = 'member_id';

    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_code', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
