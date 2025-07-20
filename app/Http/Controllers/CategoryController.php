<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::latest()->get()]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Category::newCategory($request);
        return back()->with('message', 'New Category Add Successfully');
    }

    public function edit($id)
    {
        return view('admin.category.edit', ['category' => Category::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category/index')->with('message', 'Category Update Successfully');
    }

    public function delete($id)
    {
        $subCategoryId = Category::deleteCategory($id);
        SubCategory::deleteSubCategory($subCategoryId);
        return back()->with('delete-message', 'Category Deleted Successfully');
    }



}
