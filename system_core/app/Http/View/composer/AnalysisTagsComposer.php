<?php

namespace App\Http\View\Composer;

use App\Tag;
use Illuminate\View\View;

class AnalysisTagsComposer
{
    public function compose(View $view)
    {
        $view->with('tags', Tag::with('analyses')->whereService('App\Analysis')->get());
    }
}