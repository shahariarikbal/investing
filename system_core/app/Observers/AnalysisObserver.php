<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use App\Analysis;
use Auth;

class AnalysisObserver
{
    /**
     * Handle the analysis "creaing" event.
     *
     * @param \App\Analysis $analysis
     */
    public function creating(Analysis $analysis)
    {
        if (config('app.env') === 'local') {
            return;
        }
        $analysis->created_by = Auth::guard('admin')->user()->id;
    }

    /**
     * Handle the analysis "created" event.
     *
     * @param \App\Analysis $analysis
     */
    public function created(Analysis $analysis)
    {
        $this->createProjectSlug($analysis);
        $this->clearCache($analysis);
    }

    /**
     * Handle the analysis "updated" event.
     *
     * @param \App\Analysis $analysis
     */
    public function updated(Analysis $analysis)
    {
        $this->clearCache($analysis);
    }

    /**
     * Handle the analysis "deleted" event.
     *
     * @param \App\Analysis $analysis
     */
    public function deleted(Analysis $analysis)
    {
        $this->clearCache($analysis);
    }

    /**
     * Handle the analysis "restored" event.
     *
     * @param \App\Analysis $analysis
     */
    public function restored(Analysis $analysis)
    {
        $this->clearCache($analysis);
    }

    /**
     * Handle the analysis "force deleted" event.
     *
     * @param \App\Analysis $analysis
     */
    public function forceDeleted(Analysis $analysis)
    {
        $this->clearCache($analysis);
    }

    /**
     * Removing the Entity's Entries from the Cache.
     *
     * @param \App\Analysis $analysis
     */
    private function clearCache(Analysis $analysis)
    {
        Cache::flush();
    }

    /**
     * update slug with id prefix.
     *
     * @param \App\Analysis $analysis
     */
    private function createProjectSlug(Analysis $analysis)
    {
        $analysis->slug = $analysis->id.'~'.$analysis->slug;
        $analysis->save();
    }
}
