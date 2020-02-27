<?php

namespace App\Http\Controllers\Frontend;

use App\Tag;
use App\Signal;
use App\Comment;
use App\Analysis;
use App\Category;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AnalysisController extends FrontendController
{
    public function index(Category $category = null)
    {
        Meta::prependTitle('Forex Analysis');
        
        $analyses = Analysis::select([
                                    'analyses.category_id',
                                    'analyses.id',
                                    'analyses.title',
                                    'analyses.slug',
                                    'analyses.body',
                                    'analyses.feature_image',
                                    'admins.first_name',
                                    'admins.last_name',
                                    'analyses.created_at'])
                                    ->Join('admins', 'admins.id', 'analyses.created_by')->orderBy('id', 'desc');
        if ($category) {
            $analyses = $analyses->where('category_id', $category->id);
        }
        $analyses = $analyses->whereStatus(Analysis::status('publish'))
                                    ->with('category')
                                    ->withCount('approvedComments')
                                    ->orderBy('id', 'desc')
                                    ->withCount('likes')->paginate(6);
        
        $categories =  Category::onlyParent()->onlyAnalysis()->with('childrens')->get();
        $recent_closed_trades = Signal::with('currency')->whereStatus(Signal::status('filled'))->orderBy('updated_at', 'desc')->limit(6)->get();                          

        return view('frontend.analysis.index', compact(['analyses', 'categories', 'recent_closed_trades']));
    }

    public function show(Category $category, Analysis $analysis)
    {
        if(!$analysis->status) {
            abort(404);
        }
        $related_analysis = Analysis::select([
                                'analyses.category_id',
                                'analyses.id',
                                'analyses.title',
                                'analyses.slug',
                                'analyses.body',
                                'feature_image'])
                                ->where('category_id', $analysis->category->id)
                                ->limit(6)
                                ->whereStatus(Analysis::status('publish'))
                                ->withCount('approvedComments')
                                ->withCount('likes')
                                ->get();

        $categories =  Category::onlyParent()->onlyAnalysis()->with('childrens')->get();   
        
        $next = Analysis::where('id', '>', $analysis->id)->whereStatus(Analysis::status('publish'))->first();
        $nextPermalink = $next ? $next->permalink : null;

        $prev = Analysis::where('id', '<', $analysis->id)->whereStatus(Analysis::status('publish'))->orderBy('id', 'desc')->first();
        $prevPermalink = $prev ? $prev->permalink : null;

        $recent_closed_trades = Signal::with('currency')->whereStatus(Signal::status('filled'))->orderBy('updated_at', 'desc')->limit(6)->get();

        return view('frontend.analysis.details', compact(['analysis', 'related_analysis', 'categories', 'recent_closed_trades', 'nextPermalink', 'prevPermalink']));
    }

    public function like(Request $request, Analysis $analysis)
    {
        $like = $analysis->likes()->create([
            'key' => Str::random(40),
            'ip' => request()->ip()
        ]);

        return response()->json([
            'key' => $like->key,
            'count' => Analysis::withCount('likes')->where('id', $analysis->id)->first()->likes_count
        ], 201);
    }

    public function dislike(Request $request, Analysis $analysis, $key)
    {
        $analysis->likes()->where('key', '=', $key)->delete();
        return response()->json([
            'count' => Analysis::withCount('likes')->where('id', $analysis->id)->first()->likes_count
        ], 200);
    }

    public function showRating(Request $request, Analysis $analysis, $key)
    {
        return $analysis->ratings()->where('key', '=', $key)->get()->first();
    }

    public function rating(Request $request, Analysis $analysis, $key = NULL)
    {
        if(!is_null($key)) {
            $rating = $analysis->ratings()->where('key', '=', $key)->update([
                'rating' => $request->rating
            ]);
            
            $analysis = Analysis::withCount('ratings')->where('id', $analysis->id)->first();
            return response()->json([
                'key' => $key,
                'count' => $analysis->ratings_count,
                'average' => $analysis->average_rating,
                'rating' => $request->rating
            ], 200);
        }

        $rating = $analysis->ratings()->create([
            'key' => Str::random(40),
            'ip' => request()->ip(),
            'rating' => $request->rating
        ]);

        $analysis = Analysis::withCount('ratings')->where('id', $analysis->id)->first();
        return response()->json([
            'key' => $rating->key,
            'count' => $analysis->ratings_count,
            'average' => $analysis->average_rating,
            'rating' => $request->rating
        ], 201);
    }

    public function commentStore(Request $request, Analysis $slug)
    {

    }
    public function commentUpdate(Request $request, Analysis $slug)
    {

    }
    public function commentDestroy(Request $request, Analysis $slug)
    {

    }
}
