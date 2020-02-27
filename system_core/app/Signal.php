<?php

namespace App;

use App\Traits\EmailLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\StatusKeyFinder;

class Signal extends Model
{
    use SoftDeletes, StatusKeyFinder, EmailLog;

    const MONDAY    = 'monday';
    const TUESDAY   = 'tuesday';
    const WEDNESDAY = 'wednesday';
    const THURSDAY  = 'thursday';
    const FRIDAY    = 'friday';

    const JANUARY   = 'january';
    const FEBRUARY  = 'february';
    const MARCH     = 'march';
    const APRIL     = 'april';
    const MAY       = 'may';
    const JUNE      = 'june';
    const JULY      = 'july';
    const AUGUST    = 'august';
    const SEPTEMBER = 'september';
    const OCTOBER   = 'october';
    const NOVEMBER  = 'november';
    const DECEMBER  = 'december';

    protected $dates = [
        'created_at',
        'updated_at',
        'signal_time',
        'valid_till'
    ];

    protected static $types = [
        1 => 'buy', 2 => 'sell', 3 => 'buy_limit', 4 => 'sell_limit', 5 => 'buy_stop', 6 => 'sell_stop'
    ];

    protected static $status = [
        1 => 'active', 2 => 'filled', 3 => 'cancel',  4 => 'expired'
    ];

    protected $guarded = [];

    protected $appends = ['filled', 'currency_name', 'currency_icon', 'signal_image', 'is_profit', 'signal_type_display'];

    public static function types($type)
    {
        if ($key = array_search($type, self::$types)) {
            return $key;
        }
        throw new \Exception('Your given type is\'t in the array.');
    }

    public function getRouteKeyName()
    {
        return (int)request()->route('signal') === 0 ? 'slug' : 'id';
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getTypeAttribute($value)
    {
        if (array_key_exists($value, self::$types)) {
            return self::$types[$value];
        }
    }

//    public function setTypeAttribute($value)
//    {
//        $this->attributes['type'] = array_search($value, self::$types);
//    }

    public function getStatusAttribute($value)
    {
        if (array_key_exists($value, self::$status)) {
            return self::$status[$value];
        }
    }

    public function setStatusAttribute($value)
    {
        // dd($value);
        $this->attributes['status'] = array_search($value, self::$status);
    }

    public function getFilledAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getCurrencyNameAttribute()
    {
    	return $this->currency ? $this->currency->name : null;
    }

    public function getCurrencyIconAttribute()
    {
        // return $this->currency ? $this->currency->icon : null;
        $return = "";
        if ($this->currency) {
            if ($this->currency->icon) {
                $icons = explode('-', $this->currency->icon);
                foreach($icons as $icon) {
                    $return .= "<span class=\"flag-icon flag-icon-$icon\"></span>";
                }
                return $return;
            }

            $return .= "<img src=\"" . env('APP_URL') . '/storage/currency/' . $this->logo . "\" />";
        }
        return null;
    }

    public function getSignalImageAttribute()
    {
        return is_null($this->attachment) ? null : env('APP_URL').'/'.ltrim($this->attachment, '/'); 
    }

    public function getIsProfitAttribute() {
        return $this->profit === 1;
    }

    public function getSignalTypeDisplayAttribute() {
        if ($this->type === 'buy_stop') return 'buy stop';
        if ($this->type === 'sell_stop') return 'sell stop';
        if ($this->type === 'buy_limit') return 'buy limit';
        if ($this->type === 'sell_limit') return 'sell limit';
        return $this->type;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function categories()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function currency()
    {
        //dd($this);
    	return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

}
