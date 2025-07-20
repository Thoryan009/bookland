<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookBySeller;
use App\Models\Category;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $book;

    public function index()
    {
        return view('website.cart.index', [
            'categories' => Category::all(),
            'cart_items' => Cart::content()
        ]);
    }

    public function store(Request $request,$id)
    {
        return $request->qty;
        $this->book = Book::find($id);
        
        if($this->book->stock < $request->qty)
        {
            return back()->with('error_message', "Sorry, we have left {$this->book->stock} item of this product. You can not order {$request->qty} items.");
        }
        Cart::add([
            'id' => $this->book->id,
            'name' => $this->book->name,
            'qty' => $request->qty,
            'price' => $this->book->selling_price,
            'options' => [
                'image' => $this->book->image
            ]
        ]);


        return redirect('/cart/index')->with('message', 'Book Cart add successfully.');
    }
    public function storeFromSellerBook(Request $request,$id)
    {
        $this->book = BookBySeller::find($id);
        if($this->book->stock < $request->qty)
        {
            return back()->with('error_message', "Sorry, we have left {$this->book->stock} item of this product. You can not order {$request->qty} items.");
        }
        Cart::add([
            'id_s' => $this->book->id,
            'name' => $this->book->name,
            'qty' => $request->qty,
            'price' => $this->book->selling_price,
            'options' => [
                'seller_id' => $this->book->seller_id,
                'image' => $this->book->image
            ]
        ]);

        return redirect('/cart/index')->with('message', 'Book Cart add successfully.');
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
        Cart::remove($rowId);

        return back()->with('delete-message', 'Book Cart delete successfully.');
    }

    public function directAddToCart($id)
    {
        $this->book = Book::find($id);

        Cart::add([
            'id' => $this->book->id,
            'name' => $this->book->name,
            'qty' => 1,
            'price' => $this->book->selling_price,
            'options' => [
                'image' => $this->book->image
            ]
        ]);

        return redirect('/cart/index')->with('message', 'Book Cart add successfully.');
    }
}
