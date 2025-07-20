<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    private $book;

    public function index()
    {
        return view('website.wishlist.index', [
            'categories' => Category::all(),
            'wishlist_items' => Cart::instance('wishlist')->content()
        ]);
    }


    public function update(Request $request)
    {
        foreach ($request->qty as $item)
        {
            Cart::update($item['rowId'], $item['qty']);
        }

        return back()->with('message', 'Book Cart update successfully.');
    }

    public function delete($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);

        return back()->with('delete-message', 'Book Wishlist delete successfully.');
    }

    public function directAddToWishlist($id)
    {
        $this->book = Book::find($id);

        Cart::instance('wishlist')->add([
            'id' => $this->book->id,
            'name' => $this->book->name,
            'qty' => 1,
            'price' => $this->book->selling_price,
            'options' => [
                'image' => $this->book->image
            ]
        ]);

        return redirect('/wishlist/index')->with('message', 'Book Wishlist add successfully.');
    }
}
