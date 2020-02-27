<?php

namespace App;

use App\Traits\Acted;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Interaction;
use App\Observers\BlogObserver;
use App\Traits\StatusKeyFinder;

class Blog extends Model
{
    use SoftDeletes, Interaction, Acted, Taggable, StatusKeyFinder;

    protected static $status = [
        1 => 'active',
        2 => 'inactive',
        3 => 'editing',
        4 => 'publish'
    ];

    protected $appends = ['permalink', 'is_liked', 'likes_count', 'seo_optimized', 'rating_count','average_rating', 'created'];

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        Blog::observe(BlogObserver::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getPermalinkAttribute($value)
    {
        return env('APP_URL') . '/blog/' . $this->category->slug . '/' . $this->slug;
    }

    public function getStatusAttribute($value)
    {
        if (array_key_exists($value, self::$status)) {
            return self::$status[$value];
        }
    }

//    public function setStatusAttribute($value)
//    {
//        // dd($value);
//        $this->attributes['status'] = array_search($value, self::$status);
//    }

    public function getRouteKeyName()
    {
        return (int)request()->route('blog') === 0 ? 'slug' : 'id';
    }

    public function getIsLikedAttribute()
    {
        if (auth()->guard('member')->check() && count($this->likes) > 0) {
            return $this->likes()->get()->count() > 0;
        }
        return false;
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }


    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function adminCreated()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function seo_optimize()
    {
        return $this->morphOne(SeoOptimize::class, 'optimizable');
    }

    public function getSeoOptimizedAttribute()
    {
        return $this->seo_optimize ? true : false;
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function ratings()
    {
        return $this->morphMany('App\Rating', 'rateable');
    }

    public function getRatingCountAttribute()
    {
        return $this->ratings->count();
    }

    public function ratingable($key = NULL)
    {
        if(is_null($key)) return NULL;
        
        return $this->ratings()->whereKey($key)->get() ? $this->ratings()->whereKey($key)->get()->count() === 1: NULL;
    }

    public function getAverageRatingAttribute() {
        return round($this->ratings->average('rating'));
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
