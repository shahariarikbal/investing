<?php

namespace App\Http\View\Composer;

use App\Comment;
use Illuminate\View\View;

class CommentsComposer
{

    public function __construct()
    {
        
    }

    public function compose(View $view)
    {
        $view->with('comments', Comment::with('member')->where('commentable_type', 'App\Analysis')->where('approved', 1)->take(6)->get());
    }
}
