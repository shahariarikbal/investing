<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $counts = Category::serviceWiseCount();
        return view('admin.category.list', compact('categories', 'counts'));
    }

    public function childrens(Request $request,Category $category)
    {
        return $request->expectsJson() ? $category->childrens : abort(403);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        return Category::create([
            'service'   =>  $request['service'],
            'parent_id' =>  $request['parent_id'],
            'name' =>  $request['name'],
            'slug' =>  Str::slug($request['name']),
        ]);
    }

    public function edit(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'service' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $parent = !$request->has('parent_id') ? null : $request->parent_id;

        $category->update([
            'service'   =>  $request['service'],
            'parent_id' =>  $parent,
            'name' =>  $request['name'],
        ]);
        return response()->json(['message' => 'Data successfully updated.'], 200);
    }

    public function show($service)
    {
        $categories = Category::with('parent')->where('service', '=', 'App\\'.ucfirst($service))->orderBy('id', 'desc')->get();
        return view('admin.category.show_category', compact('categories'));
    }

    public function delete($category)
    {
        $category = Category::with('childrens')->where('id', $category)->first();

        if($category->childrens->count() > 0)
        {
            return redirect()->back()->with('warning', 'You can\'t delete this category because it has children');
        }

        if($category->service::where('category_id', $category->id)->exists())
        {
            return redirect()->back()->with('warning', 'Sorry You can\'t delete this. This category already used');
        }

        Category::find($category->id)->delete();
        return redirect()->back()->with('message','Your category moved to trash');
    }

    public function destroy($id)
    {
        Category::where('id',$id)->forceDelete();
        return redirect(url('admin/category/trash'))->with('message','Your category deleted.');
    }

    public function trashCategoryList($service)
    {
        $service = $this->serviceStringToNameSpace($service);
        //dd($service);
        $trash_categories = Category::with('parent')->whereService($service)->onlyTrashed()->get();
        return view('admin.category.trash_list',compact('trash_categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message','Your category restored successfully.');
    }

    public function serviceSpecificCategory(Request $request)
    {
        return Category::where('service', $request->service)->get();
    }
}
