<?php

namespace App;

use App\SeoOptimize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nagy\LaravelRating\Traits\Rate\Rateable;

class Broker extends Model
{
    use SoftDeletes, Rateable;

    protected $guarded = [];

    protected $casts = [
        'meta' => 'array',
    ];

    protected static $pamm_mams = [
        1 => 'pamm',
        2 => 'mam'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'country_code',
        'logo', 'screenshot', 'website_title',
        'website_url', 'headquarter', 'founded_in',
        'premium', 'us_client', 'min_deposit', 'deposit_bonus',
        'first_deposit_bonus', 'ecn_deposit', 'ecn_deposit_amount',
        'islamic_acc', 'free_vps', 'pamm_mam', 'scalping', 'hedging',
        'expert_advisors', 'carousal', 'review', 'pros', 'cons', 'meta',
        'order', 'status',
    ];

    protected $appends = [
        'ratings_count',
        'rating_avg'
    ];

    public function getPammMamAttribute($value)
    {
        if (array_key_exists($value, self::$pamm_mams)) {
            return self::$pamm_mams[$value];
        }
    }

    public function setPammMamAttribute($value)
    {
        $this->attributes['pamm_mam'] = array_search($value, self::$pamm_mams);
    }

    public function getRouteKeyName()
    {
        $broker = request()->route()->parameters['broker'];
        return intval($broker) ? 'id' : 'slug';
    }
    
    public function country ()
    {
        return $this->hasOne(Country::class, 'code', 'country_code');
    }

    public function broker_types ()
    {
        return $this->belongsToMany(BrokerType::class, 'broker_broker_type', 'broker_id', 'broker_type_id');
    }

    public function payment_options ()
    {
        return $this->belongsToMany(PaymentOption::class, 'broker_payment_option', 'broker_id', 'payment_option_id')->withPivot('type');
    }

    public function regulatory_authorities ()
    {
        return $this->belongsToMany(RegulatoryAuthority::class, 'broker_regulatory_authority', 'broker_id', 'regulatory_authority_id');
    }

    public function trading_platforms ()
    {
        return $this->belongsToMany(TradingPlatform::class, 'broker_trading_platform', 'broker_id', 'trading_platform_id');
    }

    public function spread_types ()
    {
        return $this->belongsToMany(SpreadType::class, 'broker_spread_type', 'broker_id', 'spread_type_id');
    }

    public function pamm_mams ()
    {
        return $this->belongsToMany(PammMam::class, 'broker_mam_pamm', 'broker_id', 'pamm_mam_id');
    }

    public function trading_instruments ()
    {
        return $this->belongsToMany(TradingInstrument::class, 'broker_trading_instrument', 'broker_id', 'trading_instrument_id');
    }

    public function videos()
    {
        return $this->hasMany(BrokerVideo::class, 'broker_id', 'id')->orderBy('id','desc');
    }

    public function press_releases()
    {
        return $this->hasMany(PressRelease::class, 'broker_id', 'id')->orderBy('id','desc');
    }

    public function seo_optimize()
    {
        //dd($this->morphOne('App\SeoOptimize', 'optimizable'));
        return $this->morphOne(SeoOptimize::class, 'optimizable');
    }

    public function getSeoOptimizedAttribute()
    {
        return $this->seo_optimize ? true : false;
    }
}
