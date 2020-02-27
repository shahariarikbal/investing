<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Analysis;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\AnalysisRepository;
use Illuminate\Support\Facades\Validator;

class AnalysisController extends Controller
{
    protected $repository;

    public function __construct(AnalysisRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $analyses = Analysis::with('category')->orderBy('id', 'desc')->get();
        
        $categories = Category::whereParentId(NULL)->whereService(Analysis::class)->get();

        return view('admin.analyses.list', compact('analyses', 'categories'));
    }

    public function store(Request $request)
    {
        // validate incoming request
        $this->validate($request, [
            'title'  => 'required',
            'body'   => 'required',
            'status' => 'required'
        ]);
         
        // database operation
        $data = $request->only([
            'title',
            'body',
            'category_id',
            'subcategory_id',
            'feature_image',
            'orders',
            'status',
        ]);

        $analysis = $this->repository->store($data);

        // check seo data posted
        ! $request->filled('seo_title') ? $request->merge(['seo_title' => $request->title]) : $request->merge(['seo_title' => $request->seo_title]);
        ! $request->filled('seo_keyword') ? $request->merge(['seo_keyword' => $request->title]) : $request->merge(['seo_keyword' => $request->seo_keyword]);
        ! $request->filled('seo_description') ? $request->merge(['seo_description' => substr(strip_tags($request->body), 0, 170)]) : $request->merge(['seo_description' => $request->seo_description]);

        $analysis->seo_optimize()->create([
            'title' => $request->seo_title,
            'keyword' => $request->seo_keyword,
            'description' => $request->seo_description
        ]);

        return response()->json(['message', 'Analysis Create Successfully'], 201);
    }


    public function active(Analysis $analysis)
    {
        $analysis->status = Analysis::status('active');
        $analysis->save();
        return redirect()->back()->with('message', 'Analysis Active');
    }

    public function inactive(Analysis $analysis)
    {
        $analysis->status = Analysis::status('inactive');
        $analysis->save();
        return redirect()->back()->with('message', 'Analysis Inactive');
    }

    public function edit(Request $get)
    {
        $id = $get->id;
        $edit_analysis = Analysis::where('id', $id)->with(['category', 'category.childrens', 'category.parent'])->first();
        return $edit_analysis;
    }

    public function update(Request $request, Analysis $analysis)
    {
        /// validate incoming request

        $rules = [
            'title'         => 'required',
            'body'          => 'required',
            'category_id'   => 'required',
            'status'   => 'required',
        ];

        if ($request->has('feature_image')) {
            $rules['feature_image'] = 'mimes:jpeg,png';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = $request->only([
            'title',
            'body',
            'category_id',
            'subcategory_id',
            'orders',
            'status',
        ]);
        
        if ($request->has('feature_image')) {
            $data['feature_image'] = $request->feature_image;
        }

        $update_analysis = $this->repository->update($analysis, $data);

        // check seo data posted
        ! $request->filled('seo_title') ? $request->merge(['seo_title' => $request->title]) : $request->merge(['seo_title' => $request->seo_title]);
        ! $request->filled('seo_keyword') ? $request->merge(['seo_keyword' => $request->title]) : $request->merge(['seo_keyword' => $request->seo_keyword]);
        ! $request->filled('seo_description') ? $request->merge(['seo_description' => substr(strip_tags($request->body), 0, 170)]) : $request->merge(['seo_description' => $request->seo_description]);

        if ($update_analysis->seo_optimized) {
            $update_analysis->seo_optimize()->update([
                'title' => $request->seo_title,
                'keyword' => $request->seo_keyword,
                'description' => $request->seo_description
            ]);
        } else {
            $update_analysis->seo_optimize()->create([
                'title' => $request->seo_title,
                'keyword' => $request->seo_keyword,
                'description' => $request->seo_description
            ]);
        }

        if($update_analysis) {
            return response()->json(['message' => 'Analysis updated successfully'], 200);
        } else {
            return response()->json("Error");
        }

    }

    
    public function publish(Analysis $analysis)
    {
        $analysis->status = Analysis::status('publish');
        $analysis->save();
        return redirect()->back()->with('message', 'Analysis Published');
    }

    public function trashAnalysislList()
    {
        $deleted_analysis = Analysis::with('category')->onlyTrashed()->get();
        $categories = Category::whereParentId(NULL)->whereService(Blog::class)->get();
        return view('admin.analyses.trash_list', compact('categories', 'deleted_analysis'));
    }

    public function delete(Analysis $analysis)
    {
        $analysis->delete();
        return redirect()->back()->with('message', 'Analysis has been Moved to Trast List');
    }

    public function destroy($id)
    {
        $image = Analysis::withTrashed()->where('id', $id)->first()->feature_image;
        //dd($image);
        \FileUpload::remove('analysis', $image, ['open graph', 'details', 'thumbnail', 'small thumbnail']);
        Analysis::where('id',$id)->forceDelete();
        return redirect()->back()->with('message','Your analyses permanently deleted.');
    }

    public function restore($analysis)
    {
        $analysis = Analysis::onlyTrashed()->where('id', $analysis);
        $analysis->restore();

        return redirect()->back()->with('message','Analysis has been restored successfully. Please check Analysis List');
    }
}
