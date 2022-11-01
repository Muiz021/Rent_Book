<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.category',['categories' => $categories]);
    }

    public function add()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:100|unique:categories'
        ]);
        $category = Category::create($request->all());
        return redirect('categories')->with('status','Category Added Successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('category.edit',['category' => $category] )->with('status','Category Edits Successfully');
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate([
            'name' => 'required|max:100|unique:categories'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status','Category Updated Successfully');
    }

    public function delete($slug)
    {
     $category = Category::where('slug', $slug)->first();
     return view('category.delete',['category' => $category]);
    }

    public function destroy($slug)
    {
         $category = Category::where('slug', $slug)->first();
         $category->delete();
         return redirect('categories')->with('status','Category Deleted Successfully');
    }

    public function deletedCategory()
    {
        $deleteCategories = Category::onlyTrashed()->get();
        return view('category.delete-list',['deleteCategories' => $deleteCategories]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status','Category Restored Successfully');
    }
}
