<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BookBySeller;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Models\BookSellerOtherImage;

class AdminSellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::all();
        return view('admin.seller-manage.all-seller', ['sellers' => $sellers]);
    }
    public function sellerDetail($id)
    {
        $mainBalance = Balance::where('seller_id', $id)
                ->sum('seller_balance');
        $totalBalance = $mainBalance - (10/100 * $mainBalance);
        $seller = Seller::find($id);
        $books = BookBySeller::where('seller_id', $id)->get();
        return view('admin.seller-manage.seller-detail', ['seller' => $seller, 'totalBalance' =>$totalBalance, 'mainBalance' =>  $mainBalance, 'books' =>$books]);
    }

    public function sellRequestPage()
    {
        $books = BookBySeller::where('status', 0)->where('admin_comment', null)->get();
        return view('admin.seller-manage.sell-request', ['books' =>$books]);
    }

    public function sellRequestDetailPage($id)
    {
        $book  = BookBySeller::find($id);
          $otherImages = BookSellerOtherImage::where('book_id', $id)->get();
        return view('admin.seller-manage.sell-request-detail', ['book' => $book, 'otherImages' => $otherImages ]);
    }

    public function sellApprove($id)
    {
        $book = BookBySeller::find($id);
        $book->status = 1;
        $book->save();
        return redirect('/seller/request');
    }

    public function addCommentPage($id)
    {
        $book = BookBySeller::find($id);
        return view('admin.seller-manage.add-comment', ['book' => $book]);
    }

    public function storeComment(Request $request, $id)
    {
        $book = BookBySeller::find($id);
        $book->admin_comment = $request->admin_comment;
        $book->save();
         return redirect('/seller/request');
    }

    public function sellDecline($id)
    {
            BookBySeller::deleteBook($id);
            BookSellerOtherImage::deleteOtherImage($id);
            return back()->with('message', 'Book deletes Successfully');
           
    }

    public function sellerBooks()
    {
        $books = BookBySeller::all();
        return view('admin.seller-manage.seller-books', ['books' =>$books]);
    }

    public function balanceReset($id)
    {
       $balances = Balance::where('seller_id', $id)->get();
       foreach ($balances as $balance)
       {
        $balance->delete();
       }
       return back();
    }
}
