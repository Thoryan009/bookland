<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookSeries;
use App\Models\Category;
use App\Models\Language;
use App\Models\OtherImage;
use App\Models\Publisher;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.book.index', ['books' => Book::latest()->get()]);
    }

    public function create()
    {
        return view('admin.book.create', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'publishers' => Publisher::all(),
            'authors' => Author::all(),
            'book_seriess' => BookSeries::all(),
            'languages' => Language::all()
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
        $id = Book::newBook($request);

        OtherImage::newOtherImage($id, $request->file('other_image'));
        return back()->with('message', 'New Book save successfully');
    }

    public function edit($id)
    {
        return view('admin.book.edit', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'publishers' => Publisher::all(),
            'authors' => Author::all(),
            'book' => Book::find($id),
            'others_images' => OtherImage::all(),
            'languages' => Language::all(),
            'book_seriess' => BookSeries::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        Book::updateBook($request, $id);
        if (file_exists($request->file('other_image')))
        {
            OtherImage::updateOtherImage($id, $request->file('other_image'));
        }

        return redirect('/book/index')->with('message', 'Book Update Successfully.');
    }

    public function delete($id)
    {
        Book::deleteBook($id);
        OtherImage::deleteOtherImage($id);
        return back()->with('delete-message', 'Product info deleted successfully');
    }

    public function detail($id)
    {
        return view('admin.book.detail', ['book' => Book::find($id)]);
    }
}
