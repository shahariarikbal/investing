<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'public_id', 'title', 'service', 'duration', 'price', 'discount', 'details', 'created_by', 'orders', 'icon', 'note',
    ];


    protected static $duration = [
        1 => 'monthly', 2 => 'half yearly', 3 => 'yearly'
    ];

    protected $casts = [
        'details' => 'array',
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

    public static function serviceWiseCount()
    {
        $packageWiseCounts = \DB::table('packages')
                ->select(\DB::raw("count(`id`) as `count`, `service`"))
                ->groupBy('service')
                ->get();

        $counts = [];
        foreach ($packageWiseCounts as $count) {
            $counts[str_replace("App/", '', $count->service)] = $count->count;
        }
        return $counts;
    }
}


