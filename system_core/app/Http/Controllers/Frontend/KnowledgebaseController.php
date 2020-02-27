<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Knowledgebase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KnowledgebaseController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('knowledges')->with('knowledges')->where('service', 'App\Knowledgebase')->get();

        $categories = $categories->filter(function ($category) {
            if($category->knowledges_count > 0) {
                return $category->knowledges()->whereStatus(Knowledgebase::status('publish'))->get();
            }
            
        });

        //$knowledgebase = count($categories) > 0 ? array_chunk( $categories, ceil(count($categories)/2) ) : [];
        
        return view('frontend.knowledgebase.index', compact('categories'));
    }

    public function details(Knowledgebase $slug)
    {
        return view('frontend.knowledgebase.details', compact('slug'));
    }
}
