<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('website.search.index');
    }
    public function search(Request $request)
    {
        $books = Book::search($request->search,$request->category_id)->get();
        return view('website.search.index', [
            'books' => $books,
            'search' => $request->search
        ]);
    }

    public function ajaxSearch()
    {
        $search = $_GET['search'];

        $books = Book::ajaxSearch($search)->get();

        $books->transform(function ($book) {
            $book->image_url = asset($book->image);
            $book->author_name = $book->author->name;
            return $book;
        });

        return response()->json($books);
    }
}
