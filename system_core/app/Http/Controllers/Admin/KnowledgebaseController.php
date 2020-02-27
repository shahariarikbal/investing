<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Knowledgebase;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KnowledgebaseController extends Controller
{
    public function index()
    {
        $knowledgebase = Knowladgebase::with('category')->orderBy('id', 'desc')->get();
        $categories = Category::whereService(Knowladgebase::class)->get();

        return view('admin.knowledgebase.list', compact('knowledgebase', 'categories'));
    }

    public function store(Request $request)
    {
        // validate incoming request
        $validator = $this->validate($request, [
            'title'         => 'required',
            'body'          => 'required',
            'status'        => 'required',
            'category_id'   => 'required'
        ]);

        $feature_image = null;
        if($request->has('feature_image')) {
            $feature_image = \FileUpload::upload('knowledgebase', $request['feature_image'], ['open graph']);
        }

        $knowledgebase = new Knowladgebase();
        $knowledgebase->category_id = $request->category_id;
        $knowledgebase->title = $request->title;
        $knowledgebase->slug = Str::slug($request->title);
        $knowledgebase->body = $request->body;
        $knowledgebase->status = $request->status;
        $knowledgebase->orders = $request->orders;
        $knowledgebase->created_by = Auth::guard('admin')->user()->id;
        $knowledgebase->feature_image = $feature_image;
        $knowledgebase->save();

        // check seo data posted
        ! $request->filled('seo_title') ? $request->merge(['seo_title' => $request->title]) : $request->merge(['seo_title' => $request->seo_title]);
        ! $request->filled('seo_keyword') ? $request->merge(['seo_keyword' => $request->title]) : $request->merge(['seo_keyword' => $request->seo_keyword]);
        ! $request->filled('seo_description') ? $request->merge(['seo_description' => substr(strip_tags($request->body), 0, 170)]) : $request->merge(['seo_description' => $request->seo_description]);

        $knowledgebase->seo_optimize()->create([
            'title' => $request->seo_title,
            'keyword' => $request->seo_keyword,
            'description' => $request->seo_description
        ]);
        return response()->json(['message', 'Knowledgebase Create Successfully'], 201);
    }

    public function edit(Knowladgebase $knowledgebase)
    {
        return $knowledgebase;
    }

    public function update(Request $request, Knowladgebase $knowledgebase)
    {
        // validate incoming request
        $validator = $this->validate($request, [
            'title'         => 'required',
            'body'          => 'required',
            'status'        => 'required',
            'category_id'   => 'required'
        ]);

        $update_image = $knowledgebase->feature_image;
        if($request->has('feature_image')) {
            $update_image = $knowledgebase->feature_image;
            \FileUpload::remove('knowledgebase', $request['feature_image'], ['open graph']);
            $update_image = \FileUpload::upload('knowledgebase', $request->file('feature_image'), ['open graph']);
        }

        $knowledgebase->category_id = $request->category_id;
        $knowledgebase->title = $request->title;
        $knowledgebase->slug = Str::slug($request->title);
        $knowledgebase->body = $request->body;
        $knowledgebase->status = $request->status;
        $knowledgebase->orders = $request->orders;
        $knowledgebase->created_by = Auth::guard('admin')->user()->id;
        $knowledgebase->feature_image = $update_image;
        $knowledgebase->save();

        // check seo data posted
        ! $request->filled('seo_title') ? $request->merge(['seo_title' => $request->title]) : $request->merge(['seo_title' => $request->seo_title]);
        ! $request->filled('seo_keyword') ? $request->merge(['seo_keyword' => $request->title]) : $request->merge(['seo_keyword' => $request->seo_keyword]);
        ! $request->filled('seo_description') ? $request->merge(['seo_description' => substr(strip_tags($request->body), 0, 170)]) : $request->merge(['seo_description' => $request->seo_description]);

        $knowledgebase->seo_optimize()->create([
            'title' => $request->seo_title,
            'keyword' => $request->seo_keyword,
            'description' => $request->seo_description
        ]);
        return response()->json(['message' => 'Knowledgebase Update Successfully'], 200);
    }

    public function active(Knowladgebase $knowledgebase)
    {
        $knowledgebase->status = Knowladgebase::status('active');
        $knowledgebase->save();
        return redirect()->back()->with('message', 'Knowledgebase Inactive Successfully');
    }

    public function inactive(Knowladgebase $knowledgebase)
    {
        $knowledgebase->status = Knowladgebase::status('inactive');
        $knowledgebase->save();
        return redirect()->back()->with('message', 'Knowledgebase active Successfully');
    }

    public function publish(Knowladgebase $knowledgebase)
    {
        $knowledgebase->status = Knowladgebase::status('publish');
        $knowledgebase->save();
        return redirect()->back()->with('message', 'Knowledgebase publish Successfully');
    }

    public function trashKnowledgebaseList()
    {
        $deleted_knowledge = Knowladgebase::with('category')->onlyTrashed()->get();
        $categories = Category::whereService(Knowladgebase::class)->get();
        return view('admin.knowledgebase.trash_list', compact('categories', 'deleted_knowledge'));
    }

    public function delete(Knowladgebase $knowledgebase)
    {
        $knowledgebase->delete();
        return redirect()->back()->with('message', 'Knowledgebase has been Moved to Trast List');
    }

    public function destroy($id)
    {
        $image = Knowladgebase::withTrashed()->where('id', $id)->first()->feature_image;
        //dd($image);
        \FileUpload::remove('knowledgebase', $image, ['open graph']);
        Knowladgebase::where('id',$id)->forceDelete();
        return redirect()->back()->with('message','Your knowledgebase permanently deleted.');
    }

    public function restore($knowledgebase)
    {
        $knowledgebase = Knowladgebase::onlyTrashed()->where('id', $knowledgebase);
        $knowledgebase->restore();

        return redirect()->back()->with('message','knowledgebase has been restored successfully. Please check knowledgebase List');
    }
}
