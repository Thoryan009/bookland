<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', ['products' => Product::latest()->get()]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }

    public function getSubCategoryByCategory()
    {
        $categoryId = $_GET['id'];

        $subCategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subCategories);
    }

    public function store(Request $request)
    {
        $id = Product::newProduct($request);

        OtherImage::newOtherImage($id, $request->file('other_image'));
        return back()->with('message', 'New Product save successfully');
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
            'product' => Product::find($id)
        ]);
    }
}
