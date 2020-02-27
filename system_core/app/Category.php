<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $appends = ['permalink'];

    public function onlyService ($query, $service)
    {
        return $query->where('service', $service);
    }

    public function scopeOnlyBlog($query)
    {
        return $this->onlyService($query, 'App\\Blog');
    }

    public function scopeOnlyAnalysis($query)
    {
        return $this->onlyService($query, 'App\\Analysis');
    }

    public function scopeOnlyParent($query)
    {
        return $query->where('parent_id', null);
    }

    public function getPermalinkAttribute($value)
    {
        return env('APP_URL')  . '/' . \Illuminate\Support\Str::plural(strtolower(explode('\\', $this->service)[1])) . '/' . $this->slug;
    }

    public function getRouteKeyName()
    {
        return (int)request()->route('category') === 0 ? 'slug' : 'id';
    }

    public static function serviceWiseCount()
    {
        $categories_count = DB::table('categories')
                ->select(DB::raw("count(`id`) as `count`, `service`"))
                ->groupBy('service')
                ->get();

        $counts = [];
        foreach ($categories_count as $count) {
            $counts[str_replace("App/", '', $count->service)] = $count->count;
        }
        return $counts;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function childrens()
     {
        return $this->hasMany(self::class, 'parent_id');
     }

     public function parent()
     {
        return $this->belongsTo(self::class, 'parent_id', 'id');
     }

    public function analysis()
    {
        return $this->hasMany(Analysis::class);
    }

    public function knowledges()
    {
        return $this->hasMany(knowledgebase::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function signals()
    {
        return $this->hasMany(Signal::class);
    }
}
