<?php

namespace App\Http\View\Composer;

use App\Tag;
use Illuminate\View\View;

class BlogTagsComposer
{
    public function compose(View $view)
    {
        $view->with('tags', Tag::with('blogs')->whereService('App\Blog')->orderBy('id', 'desc')->get());
    }
}