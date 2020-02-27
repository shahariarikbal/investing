<?php

namespace App;

use App\Country;
use Illuminate\Database\Eloquent\Model;

class CountryParameter extends Model
{
    protected $fillable = ['country_code', 'quick_display'];
    
    public $timestamps = false;

    public function country() 
    {
        return $this->belongsTo(Country::class);
    }
}
