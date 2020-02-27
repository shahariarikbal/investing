<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use App\Blog;
use Auth;

class BlogObserver
{
    /**
     * Handle the blog "creaing" event.
     *
     * @param \App\Blog $blog
     */
    public function creating(Blog $blog)
    {
        if (config('app.env') === 'local') {
            return;
        }
        $blog->created_by = Auth::guard('admin')->user()->id;;
    }

    /**
     * Handle the blog "created" event.
     *
     * @param \App\Blog $blog
     */
    public function created(Blog $blog)
    {
        $this->createSlug($blog);
        $this->clearCache($blog);
    }

    /**
     * Handle the blog "updated" event.
     *
     * @param \App\Blog $blog
     */
    public function updated(Blog $blog)
    {
        $this->clearCache($blog);
    }

    /**
     * Handle the blog "deleted" event.
     *
     * @param \App\Blog $blog
     */
    public function deleted(Blog $blog)
    {
        $this->clearCache($blog);
    }

    /**
     * Handle the blog "restored" event.
     *
     * @param \App\Blog $blog
     */
    public function restored(Blog $blog)
    {
        $this->clearCache($blog);
    }

    /**
     * Handle the blog "force deleted" event.
     *
     * @param \App\Blog $blog
     */
    public function forceDeleted(Blog $blog)
    {
        $this->clearCache($blog);
    }

    /**
     * Removing the Entity's Entries from the Cache.
     *
     * @param \App\Blog $blog
     */
    private function clearCache(Blog $blog)
    {
        Cache::flush();
    }

    /**
     * update slug with id prefix.
     *
     * @param \App\Blog $blog
     */
    private function createSlug(Blog $blog)
    {
        $blog->slug = $blog->id.'~'.$blog->slug;
        $blog->save();
    }
}
