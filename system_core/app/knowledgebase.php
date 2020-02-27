<?php

namespace App;

use App\Traits\StatusKeyFinder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledgebase extends Model
{
    use SoftDeletes, StatusKeyFinder;

    protected $table = 'knowledgebases';

    protected $guarded = [];

    protected $appends = ['seo_optimized'];

    protected static $status = [
        1 => 'active',
        2 => 'inactive',
        3 => 'editing',
        4 => 'publish'
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

    // public function setStatusAttribute($value)
    // {
    //     // dd($value);
    //     $this->attributes['status'] = array_search($value, self::$status);
    // }

    public function getRouteKeyName()
    {
        return (int)request()->route('knowledgebase') === 0 ? 'slug' : 'id';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP  
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seo_optimize()
    {
        return $this->morphOne(SeoOptimize::class, 'optimizable');
    }

    public function getSeoOptimizedAttribute()
    {
        return $this->seo_optimize ? true : false;
    }

}
