<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        return view('admin.sub-category.index',['sub_categories' => SubCategory::latest()->get()]);
    }

    public function create()
    {
        return view('admin.sub-category.create', [
            'categories' => Category::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.sub-category.edit', [
            'sub_category' => SubCategory::find($id),
            'categories'   => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'new sub category add Successfully.');
    }

    public function update(Request $request,$id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category/index')->with('message', 'sub category update successfully');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('delete-message', 'sub category delete successfully');
    }

}
