<?php


namespace App\Http\View\Composer;

use App\Blog;
use Illuminate\View\View;

class LatestBlogComposer
{
    public function compose(View $view)
    {
        $blogs = Blog::select(['blogs.category_id',
                                    'blogs.id','blogs.title', 'blogs.slug',
                                    'blogs.body', 'blogs.feature_image',
                                    'blogs.created_at'
                                ])
                                    ->whereStatus(Blog::status('publish'))
                                    ->withCount('approvedComments')
                                    ->orderBy('id', 'desc')
                                    ->withCount('likes')->take(6)->get();

        $blogs = $blogs->map(function ($blog) {
            return [
                'body' => substr(strip_tags($blog->body), 0, 360),
                'title' => $blog->title,
                'slug' => $blog->slug,
                'feature_image' => $blog->feature_image,
                'permalink' => $blog->permalink,
                'created' => $blog->created
            ];
        });

        $view->with('blogs', $blogs);
    }
}
