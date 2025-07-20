<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BookSeries;
use Illuminate\Http\Request;

class BookSeriesController extends Controller
{
    public function index()
    {
        return view('admin.book-series.index', ['book_seriess' =>  BookSeries::latest()->get()]);
    }

    public function create()
    {
        return view('admin.book-series.create', ['authors' => Author::all()]);
    }

    public function store(Request $request)
    {
        BookSeries::newBookSeries($request);
        return back()->with('message', 'Book-series Add Successfully');
    }

    public function edit($id)
    {
        return view('admin.book-series.edit', [
            'book_series' => BookSeries::find($id),
            'authors'     => Author::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        BookSeries::updateBookSeries($request, $id);
        return redirect('/book-series/index')->with('message', 'Book-series Update Successfully');
    }

    public function delete($id)
    {
        BookSeries::deleteBookSeries($id);
        return back()->with('delete-message', 'Book-series Deleted Successfully');
    }
}
