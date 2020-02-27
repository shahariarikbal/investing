<?php

namespace Fxtutor\Wallet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Plan extends Model
{
    use SoftDeletes;
    /**
     * Name of Model table
     * @var string
     */
    protected $table = 'plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'service',
        'duration',
        'price',
        'recursive',
        'settings',
        'details',
        'created_by',
        'updated_by',
        'deleted_by',
        'orders',
        'icon',
        'note',
    ];

    /**
     * The attributes that should be cast after retrived
     * @var array
     */
    protected $casts = [
        'settings' => 'array',
        'details' => 'array'
    ];

    protected static $duration = [
        1 => 'monthly', 2 => 'biyearly', 3 => 'yearly', 4 => 'daily', 5 => 'quarterly'
    ];

    public static function duration($duration)
    {
        if ($key = array_search($duration, self::$duration)) {
            return $key;
        }
        throw new \Exception('Your given duration is\'t in the array.');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getDurationAttribute($value)
    {
        // if ($value) {
            if (array_key_exists($value, self::$duration)) {
                return self::$duration[$value];
            }
        // }
        // return self::$duration[0];

    }

    public function setDurationAttribute($value)
    {
        $this->attributes['duration'] = array_search($value, self::$duration);
    }

    public function getRouteKeyName()
    {
        $plan = request()->route('plan');
        if (!is_numeric($plan)) {
            return 'name';
        }

        return 'id';
    }

    public static function serviceWiseCount()
    {
        $packageWiseCounts = \DB::table('plans')
                ->select(\DB::raw("count(`id`) as `count`, `service`"))
                ->groupBy('service')
                ->get();

        $counts = [];
        foreach ($packageWiseCounts as $count) {
            $counts[str_replace("App/", '', $count->service)] = $count->count;
        }
        return $counts;
    }

   /**
     * Get the member that owns the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'plan_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

}
