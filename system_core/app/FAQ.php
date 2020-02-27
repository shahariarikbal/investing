<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\StatusKeyFinder;

class FAQ extends Model
{
    use SoftDeletes, StatusKeyFinder;

    protected $table = 'faqs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service', 'question', 'answer', 'created_by',
    ];

    protected static $status = [
        'inactive', 'active'
    ];

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getStatusAttribute($value)
    {
        if (array_key_exists($value, self::$status)) {
            return self::$status[$value];
        }
    }

    public static function serviceWiseCount()
    {
        $faqs_count = \DB::table('faqs')
                ->select(\DB::raw("count(`id`) as `count`, `service`"))
                ->groupBy('service')
                ->get();

        $counts = [];
        foreach ($faqs_count as $count) {
            $counts[str_replace("App\\", '', $count->service)] = $count->count;
        }
        return $counts;
    }

    
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
