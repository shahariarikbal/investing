<?php

namespace App\Http\View\Composer;

use App\Comment;
use Illuminate\View\View;

class BlogCommentComposer
{


    public function compose(View $view)
    {
        $view->with('comments', Comment::with('member')->where('commentable_type', 'App\Blog')->whereApproved(1)->take(6)->get());
    }
}
