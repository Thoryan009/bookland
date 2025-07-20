<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookBySeller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\SubCategory;
use Cart;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.home.index', [
            'banner_book_one'       => Book::latest()->first(),
            'banner_book_two'       => Book::latest()->skip(1)->first(),
            'slider_book'           => Book::latest()->take(4)->get(),
            'new_book'              => Book::latest()->take(6)->get(),
            'home_category_one'     => Category::where('home_status', 1)->orderBy('id', 'asc')->first(),
            'home_category_two'     => Category::where('home_status', 1)->orderBy('id', 'asc')->skip(1)->first(),
            'home_category_three'     => Category::where('home_status', 1)->orderBy('id', 'asc')->skip(2)->first(),
            'authors'               => Author::all(),
            'publishers'            => Publisher::all(),
            'feature_products'      => Book::latest()->skip(7)->take(3)->get(),
            'special_offer'         => Book::orderBy('id', 'asc')->take(4)->get(),
        ]);
    }

    public function aboutUs()
    {
           
        return view('website.about-us.index');
    }
    public function contact()
    {
           
        return view('website.contact.index');
    }

    public function privacyPolicy()
    {
        return view('website.privacy-policy.index');
    }

    public function returnRefund()
    {
        return view('website.return-refund.index');
    }

    public function faq()
    {
        return view('website.faq.index');
    }

    public function oldBook()
    {
        $books = BookBySeller::where('status', 1)->get();
        return view('website.old-books.index', ['books' => $books]);
    }

    public function category($id)
    {
        return view('website.category.index', [
            'categories' => Category::all(),
            'category' => Category::find($id)
        ]);
    }

    public function publisher($id)
    {
        return view('website.publisher.index', [
            'publishers' => Publisher::all(),
            'publisher' => Publisher::find($id)
        ]);
    }

    public $book, $categoryBooks;
    public function product($id)
    {
        $this->book = Book::find($id);
        $this->categoryBooks = Book::where('category_id', $this->book->category_id)->latest()->get();

        return view('website.product.index', [
            'book'     => $this->book,
            'categories' => Category::all(),
            'category_books' => $this->categoryBooks,
            'cart_items' => Cart::content()
        ]);
    }

    public function oldBookDetail($id)
    {
        $book = BookBySeller::find($id);
        return view('website.old-books.book-details', ['book' =>$book]);
    }

    public function authorDetail($id)
    {
        return view('website.author.index', ['author' => Author::find($id)]);
    }

}
