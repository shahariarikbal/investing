<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Signal;
use App\Category;
// use App\Interaction\Interaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;

class BlogController extends FrontendController
{

    public function index(Category $category = null)
    {
        Meta::prependTitle('Blogs');

        $categories =  Category::onlyParent()->onlyBlog()->with('childrens')->get();
        //return $categories;
        $recent_closed_trades = Signal::with('currency')->whereStatus(Signal::status('filled'))->orderBy('updated_at', 'desc')->limit(6)->get();

        $blogs = Blog::select([
                                'blogs.category_id',
                                'blogs.id',
                                'blogs.title',
                                'blogs.slug',
                                'blogs.body',
                                'blogs.feature_image',
                                'admins.first_name',
                                'admins.last_name',
                                'blogs.created_at'])
                                ->Join('admins', 'admins.id', 'blogs.created_by')->orderBy('id', 'desc');
        if ($category) {
            // $c = Category::with('blog')->where('parent_id', $category->id)->get();
            // $d[] = $c->map(function ($category) {
            //     return $category->blog;
            // });
            //dd($d);
            $blogs = $blogs->where('category_id', $category->id);
        }
        $blogs = $blogs->with('createBy')
                                ->with('category')
                                ->withCount('approvedComments')
                                ->withCount('likes')
                                ->orderBy('id', 'desc')
                                ->whereStatus(Blog::status('publish'))
                                ->paginate(6);
           
        return view('frontend.blog.index', compact(['blogs', 'categories', 'recent_closed_trades']));
    }

    public function show(Category $category, Blog $blog)
    {
        if(!$blog->status) {
            abort(404);
        }

        $related_blog = Blog::select([
                            'blogs.category_id',
                            'blogs.id',
                            'blogs.title',
                            'blogs.slug',
                            'blogs.body',
                            'blogs.feature_image'])
                            ->where('blogs.category_id', $blog->category->id)
                            ->whereStatus(Blog::status('publish'))
                            ->with('category')
                            ->withCount('approvedComments')
                            ->withCount('likes')
                            ->limit(6)
                            ->get();


        $categories =  Category::onlyParent()->onlyBlog()->with('childrens')->get();

        $next = Blog::where('id', '>', $blog->id)->whereStatus(Blog::status('publish'))->first();
        $nextPermalink = $next ? $next->permalink : null;

        $prev = Blog::where('id', '<', $blog->id)->whereStatus(Blog::status('publish'))->orderBy('id', 'desc')->first();
        $prevPermalink = $prev ? $prev->permalink : null;

        $recent_closed_trades = Signal::with('currency')->whereStatus(Signal::status('filled'))->orderBy('updated_at', 'desc')->limit(6)->get();

        return view('frontend.blog.details', compact(['blog', 'related_blog', 'categories', 'recent_closed_trades', 'nextPermalink', 'prevPermalink']));
    }

    public function like(Request $request, Blog $blog)
    {
        $like = $blog->likes()->create([
            'key' => Str::random(40),
            'ip' => request()->ip()
        ]);

        return response()->json([
            'key' => $like->key,
            'count' => Blog::withCount('likes')->where('id', $blog->id)->first()->likes_count
        ], 201);
    }

    public function dislike(Request $request, Blog $blog, $key)
    {
        $blog->likes()->where('key', '=', $key)->delete();
        return response()->json([
            'count' => Blog::withCount('likes')->where('id', $blog->id)->first()->likes_count
        ], 200);
    }
    
    public function showRating(Request $request, Blog $blog, $key)
    {
        return $blog->ratings()->where('key', '=', $key)->get()->first();
    }

    public function rating(Request $request, Blog $blog, $key = NULL)
    {
        if(!is_null($key)) {
            $rating = $blog->ratings()->where('key', '=', $key)->update([
                'rating' => $request->rating
            ]);
            
            $blog = Blog::withCount('ratings')->where('id', $blog->id)->first();
            return response()->json([
                'key' => $key,
                'count' => $blog->ratings_count,
                'average' => $blog->average_rating,
                'rating' => $request->rating
            ], 200);
        }

        $rating = $blog->ratings()->create([
            'key' => Str::random(40),
            'ip' => request()->ip(),
            'rating' => $request->rating
        ]);

        $blog = Blog::withCount('ratings')->where('id', $blog->id)->first();
        return response()->json([
            'key' => $rating->key,
            'count' => $blog->ratings_count,
            'average' => $blog->average_rating,
            'rating' => $request->rating
        ], 201);
    }

    public function commentStore(Request $request, Blog $blog)
    {

    }
    public function commentUpdate(Request $request, Blog $blog)
    {

    }
    public function commentDestroy(Request $request, Blog $blog)
    {

    }
}
