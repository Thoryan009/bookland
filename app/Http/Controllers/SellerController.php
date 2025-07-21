<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BookBySeller;
use App\Models\BookSellerOtherImage;
use App\Models\Courier;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Balance;
use Illuminate\Validation\Rules\Password;

// use Session;

class SellerController extends Controller
{
    public $seller;

    public function registrationPage()
    {
        return view('seller.registration');
    }

    public function newSeller(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:sellers,email',
            'password' => [
                'required',
               
                Password::min(8)
                    ->mixedCase()      // upper + lower case
                    ->letters()        // must contain letters
                    ->numbers()        // must contain numbers
                    ->symbols()        // must contain symbols
                    ->uncompromised(), // check against leaked passwords
            ],
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', // 2048 KB = 2MB
            'mobile' => 'required|digits:11|numeric|unique:customers,mobile',
            'address' => 'required'
        ]);
        // return $validated
        $seller = Seller::newSeller($validated);

        Auth::guard('seller')->login($seller);
        return redirect('/seller/profile');
    }
    public function loginPage()
    {
        return view('seller.login');
    }


    public function sellerLogin(Request $request)
    {


        // $credentials = $request->only('email', 'password');
        $credentials = $request->validate([
            'email' => 'required|email|exists:sellers,email',
            'password' => 'required',
        ]);

        if (Auth::guard('seller')->attempt($credentials)) {
            return redirect('/seller/profile');
        } else {
            return back()->with('message', 'Email or password in invalid');
        }
    }

    public function sellerProfile()
    {
        $seller_Id = Auth::guard('seller')->user()->id;

        $mainBalance = Balance::where('seller_id', $seller_Id)
            ->sum('seller_balance');
        $totalBalance = $mainBalance - (10 / 100 * $mainBalance);
        return view('seller.profile', [
            'seller' => Seller::find($seller_Id),
            'totalBalance' => $totalBalance
        ]);
    }

    public function updateSeller(Request $request, $id)
    {
        // return $request;
        Seller::updateSeller($request, $id);
        return back();
    }

    public function addBookPage()
    {
        $seller_Id = Auth::guard('seller')->user()->id;
        return view('seller.add-book', [
            'seller' => Seller::find($seller_Id),
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'languages' => Language::all()
        ]);
    }

    public function storeBook(Request $request)
    {
        $id = BookBySeller::newBook($request);
        BookSellerOtherImage::newOtherImage($id, $request->file('other_image'));
        return back()->with('message', 'New Book save successfully');
    }

    public function mybook()
    {
        $seller_id = Auth::guard('seller')->user()->id;
        $my_books = BookBySeller::where('seller_id', $seller_id)->get();

        return view('seller.my-book', ['seller' => Seller::find($seller_id), 'books' => $my_books]);
    }

    public function myBookDetail($id)
    {
        $seller_id = Auth::guard('seller')->user()->id;
        $book = BookBySeller::find($id);
        $otherImages = BookSellerOtherImage::where('book_id', $id)->get();
        // return  $otherImages;
        return view('seller.my-book-detail', ['book' => $book, 'seller' => Seller::find($seller_id), 'otherImages' => $otherImages]);
    }

    public function editBook($id)
    {
        $seller_id = Auth::guard('seller')->user()->id;
        $book = BookBySeller::find($id);
        $otherImages = BookSellerOtherImage::where('book_id', $id)->get();

        return view('seller.edit-my-book', [
            'book' => $book,
            'seller' => Seller::find($seller_id),
            'otherImages' => $otherImages,
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'languages' => Language::all()
        ]);
    }

    public function updateBook(Request $request, $id)
    {
        BookBySeller::updateBook($request, $id);
        if (file_exists($request->file('other_image'))) {
            BookSellerOtherImage::updateOtherImage($id, $request->file('other_image'));
        }

        return redirect('/seller/my-books')->with('message', 'Book Update Successfully.');
    }

    public function customerOrders()
    {
        $seller_id = Auth::guard('seller')->user()->id;
        $orders = Order::whereHas('orderDetail', function ($query) {
            $query->where('seller_id', Auth::guard('seller')->user()->id);
        })
            ->get();

        return view('seller.customer-order', ['orders' => $orders, 'seller' => Seller::find($seller_id),]);
    }

    public function customerOrderDetail($id)
    {
        $seller_id = Auth::guard('seller')->user()->id;
        $order = Order::find($id);
        return view('seller.customer-order-detail', ['order' => $order, 'seller' => Seller::find($seller_id)]);
    }

    public function customerOrderEdit($id)
    {
        $seller_id = Auth::guard('seller')->user()->id;
        $couriers = Courier::all();
        $order = OrderDetail::find($id);
        return view('seller.customer-order-edit', ['order' => $order, 'couriers' => $couriers, 'seller' => Seller::find($seller_id)]);
    }

    public function customerOrderUpdate(Request $request, $id)
    {
        $order = OrderDetail::find($id);
        $order_id = $order->order_id;
        if ($request->courier_id) {
            $order->delivery_status_seller = 'Processing';
            $order->courier_id_seller = $request->courier_id;
        } else {
            $order->delivery_status_seller = 'Pending';
            $order->courier_id_seller = null;
        }

        $order->save();

        return redirect("/seller/customer-order-detail/{$order_id}");
    }
}
