<?php

namespace App\Http\View\Composer;

use App\Analysis;
use Illuminate\View\View;

class LatestAnalysisComposer
{
    public function compose(View $view)
    {
        $view->with('analyses', Analysis::select([
                                                'analyses.id','analyses.category_id', 'analyses.title', 'analyses.slug',
                                                 'analyses.body', 'analyses.feature_image', 'analyses.created_at'])
                                                ->whereStatus(Analysis::status('publish'))
                                                ->withCount('approvedComments')
                                                ->orderBy('id', 'desc')
                                                ->withCount('likes')->limit(6)->get());
    }
}
