<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;


class BookBySeller extends Model
{
    public static $image, $imageName, $directory, $imageUrl, $discount, $tags, $book;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName() . rand();
        self::$directory = 'upload/book-by-seller-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function newBook($request)
    {

        if ($request->tags) {
            self::$tags = explode(',', $request->tags); // স্ট্রিং থেকে অ্যারে বানানো
            self::$tags = array_map('trim', self::$tags); // প্রতিটি ট্যাগের অপ্রয়োজনীয় স্পেস রিমুভ
        }


        self::$book = new BookBySeller();
        self::$book->seller_id = Auth::guard('seller')->user()->id;
        self::$book->category_id = $request->category_id;
        self::$book->sub_category_id = $request->sub_category_id;
        self::$book->publisher_name = $request->publisher_name;
        self::$book->author_name = $request->author_name;
        self::$book->language_id = $request->language_id;
        self::$book->name = $request->name;
        self::$book->code = $request->code;
        self::$book->original_price = $request->original_price;
        self::$book->selling_price = $request->selling_price;
        self::$book->stock = $request->stock;
        self::$book->short_description = $request->short_description;
        self::$book->long_description = $request->long_description;
        self::$book->meta_title = $request->meta_title;
        self::$book->meta_description = $request->meta_description;
        self::$book->tags = json_encode(self::$tags);
        self::$book->pages = $request->pages;
        self::$book->published_date = $request->published_date;
        self::$book->book_format = $request->book_format;
        self::$book->isbn = $request->isbn;
        self::$book->image = self::getImageUrl($request);

        self::$book->save();

        return self::$book->id;
    }

    public static function updateBook($request, $id)
    {
        self::$book = BookBySeller::find($id);


        if ($request->tags) {
            self::$tags = explode(',', $request->tags); // স্ট্রিং থেকে অ্যারে বানানো
            self::$tags = array_map('trim', self::$tags); // প্রতিটি ট্যাগের অপ্রয়োজনীয় স্পেস রিমুভ
        }

        if ($request->file('image')) {
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = self::$book->image;
        }

        self::$book->seller_id = Auth::guard('seller')->user()->id;
        self::$book->category_id = $request->category_id;
        self::$book->sub_category_id = $request->sub_category_id;
        self::$book->publisher_name = $request->publisher_name;
        self::$book->author_name = $request->author_name;
        self::$book->language_id = $request->language_id;
        self::$book->name = $request->name;
        self::$book->code = $request->code;
        self::$book->original_price = $request->original_price;
        self::$book->selling_price = $request->selling_price;
        self::$book->stock = $request->stock;
        self::$book->short_description = $request->short_description;
        self::$book->long_description = $request->long_description;
        self::$book->meta_title = $request->meta_title;
        self::$book->meta_description = $request->meta_description;
        self::$book->tags = json_encode(self::$tags);
        self::$book->pages = $request->pages;
        self::$book->published_date = $request->published_date;
        self::$book->book_format = $request->book_format;
        self::$book->isbn = $request->isbn;
        self::$book->image =  self::$imageUrl;
        self::$book->admin_comment =  null;

        self::$book->save();
    }

    public function otherImages()
    {
        return $this->hasMany(BookSellerOtherImage::class, 'book_id', 'id');
    }



    public static function deleteBook($id)
    {
        self::$book = BookBySeller::find($id);

        if (self::$book->image) {
            unlink(self::$book->image);
        }
        self::$book->delete();
    }




    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
