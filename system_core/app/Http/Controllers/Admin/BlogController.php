<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Repositories\BlogRepository;
use App\Uploader\FileUpload;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    protected $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $blogs = Blog::with('category')->orderBy('id', 'desc')->get();
        $categories = Category::whereParentId(NULL)->whereService(Blog::class)->get();

        return view('admin.blogs.list', compact('blogs', 'categories'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        // validate incoming request
        $this->validate($request, [
            'title'  => 'required',
            'body'   => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        // database operation
        $data = $request->only([
            'title',
            'body',
            'category_id',
            'subcategory_id',
            'feature_image',
            'orders',
            'status'
        ]);
        //dd($data);
        $blog = $this->repository->store($data);
        //dd($blog);
        // check seo data posted
        ! $request->filled('seo_title') ? $request->merge(['seo_title' => $request->title]) : $request->merge(['seo_title' => $request->seo_title]);
        ! $request->filled('seo_keyword') ? $request->merge(['seo_keyword' => $request->title]) : $request->merge(['seo_keyword' => $request->seo_keyword]);
        ! $request->filled('seo_description') ? $request->merge(['seo_description' => substr(strip_tags($request->body), 0, 170)]) : $request->merge(['seo_description' => $request->seo_description]);

        $blog->seo_optimize()->create([
            'title' => $request->seo_title,
            'keyword' => $request->seo_keyword,
            'description' => $request->seo_description
        ]);

        return response()->json(['message' => 'Blog Data successfully inserted.'], 201);
    }

    public function active(Blog $blog)
    {
        $blog->status = Blog::status('active');
        $blog->save();
        return redirect()->back()->with('message', 'Blog Active');
    }

    public function inactive(Blog $blog)
    {
        $blog->status = Blog::status('inactive');
        $blog->save();
        return redirect()->back()->with('message', 'Blog Inactive');
    }

    public function publish(Blog $blog)
    {
        $blog->status = Blog::status('publish');
        $blog->save();
        return redirect()->back()->with('message', 'Blog Published');
    }

    public function edit(Request $get)
    {
        $id = $get->id;
//        $category = Category::whereService(Blog::class)->whereParentId(NULL)->get();
        $edit_blog = Blog::where('id', $id)->with(['category', 'category.childrens', 'category.parent', 'seo_optimize'])->first();
        return $edit_blog;
    }

    public function update(Request $request, Blog $blog)
    {
//        dump($request->all());
//        return response()->json([], 500);
        // validate incoming request
        $rules = [
            'title'         => 'required',
            'body'          => 'required',
            'category_id'   => 'required',
            'status'        => 'required',
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
            'status'
        ]);

        if ($request->has('feature_image')) {
            $data['feature_image'] = $request->feature_image;
        }

        $update_blog = $this->repository->update($blog, $data);

        // check seo data posted
        ! $request->filled('seo_title') ? $request->merge(['seo_title' => $request->title]) : $request->merge(['seo_title' => $request->seo_title]);
        ! $request->filled('seo_keyword') ? $request->merge(['seo_keyword' => $request->title]) : $request->merge(['seo_keyword' => $request->seo_keyword]);
        ! $request->filled('seo_description') ? $request->merge(['seo_description' => substr(strip_tags($request->body), 0, 170)]) : $request->merge(['seo_description' => $request->seo_description]);

        if ($update_blog->seo_optimized) {
            $update_blog->seo_optimize()->update([
                'title' => $request->seo_title,
                'keyword' => $request->seo_keyword,
                'description' => $request->seo_description
            ]);
        } else {
            $update_blog->seo_optimize()->create([
                'title' => $request->seo_title,
                'keyword' => $request->seo_keyword,
                'description' => $request->seo_description
            ]);
        }

        if($update_blog) {
            return response()->json($update_blog, 200);
        } else {
            return response()->json("Error");
        }
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('message', 'Blog has been Moved to Trast List');
    }

    public function trashBloglList()
    {
        $deleted_blogs = Blog::with('category')->onlyTrashed()->get();
        $categories = Category::whereParentId(NULL)->whereService(Blog::class)->get();
        return view('admin.blogs.trash_list', compact('categories', 'deleted_blogs'));
    }

    public function destroy($id)
    {
        $image = Blog::withTrashed()->where('id', $id)->first()->feature_image;
        //dd($image);
        \FileUpload::remove('blog', $image, ['open graph', 'details', 'thumbnail', 'small thumbnail']);
        Blog::where('id',$id)->forceDelete();
        return redirect()->back()->with('message','Your blog permanently deleted.');
    }

    public function restore($blog)
    {
        $blog = Blog::onlyTrashed()->where('id', $blog);
        $blog->restore();

        return back()->with('message', 'Blog has been restored successfully. Please Check Blog List.');
    }

    public function editorImageUpload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('editor-images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('editor-images/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
