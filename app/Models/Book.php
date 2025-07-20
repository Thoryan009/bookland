<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public static $image, $imageName, $directory, $imageUrl, $discount, $tags, $book;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/book-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function getDiscount($request)
    {
        self::$discount = (($request->regular_price - $request->selling_price) / $request->regular_price) * 100;

        return self::$discount;
    }

    public static function newBook($request)
    {

        if ($request->tags)
        {
            self::$tags = explode(',', $request->tags); // স্ট্রিং থেকে অ্যারে বানানো
            self::$tags = array_map('trim', self::$tags); // প্রতিটি ট্যাগের অপ্রয়োজনীয় স্পেস রিমুভ
        }


        self::$book = new Book();
        self::$book->category_id = $request->category_id;
        self::$book->sub_category_id = $request->sub_category_id;
        self::$book->publisher_id = $request->publisher_id;
        self::$book->author_id = $request->author_id;
        self::$book->language_id = $request->language_id;
        self::$book->book_series_id = $request->book_series_id;
        self::$book->name = $request->name;
        self::$book->code = $request->code;
        self::$book->regular_price = $request->regular_price;
        self::$book->selling_price = $request->selling_price;
        self::$book->discount = self::getDiscount($request);
        self::$book->stock = $request->stock;
        self::$book->status = $request->status;
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
        self::$book = Book::find($id);

        if ($request->tags)
        {
            self::$tags = explode(',', $request->tags); // স্ট্রিং থেকে অ্যারে বানানো
            self::$tags = array_map('trim', self::$tags); // প্রতিটি ট্যাগের অপ্রয়োজনীয় স্পেস রিমুভ
        }

        if ($request->file('image'))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$book->image;
        }

        self::$book->category_id = $request->category_id;
        self::$book->sub_category_id = $request->sub_category_id;
        self::$book->publisher_id = $request->publisher_id;
        self::$book->author_id = $request->author_id;
        self::$book->language_id = $request->language_id;
        self::$book->book_series_id = $request->book_series_id;
        self::$book->name = $request->name;
        self::$book->code = $request->code;
        self::$book->regular_price = $request->regular_price;
        self::$book->selling_price = $request->selling_price;
        self::$book->discount = self::getDiscount($request);
        self::$book->stock = $request->stock;
        self::$book->status = $request->status;
        self::$book->short_description = $request->short_description;
        self::$book->long_description = $request->long_description;
        self::$book->meta_title = $request->meta_title;
        self::$book->meta_description = $request->meta_description;
        self::$book->tags = json_encode(self::$tags);
        self::$book->pages = $request->pages;
        self::$book->published_date = $request->published_date;
        self::$book->book_format = $request->book_format;
        self::$book->isbn = $request->isbn;
        self::$book->image = self::$imageUrl;

        self::$book->save();
    }

    public static function deleteBook($id)
    {
        self::$book = Book::find($id);

        if (self::$book->image)
        {
            unlink(self::$book->image);
        }
        self::$book->delete();
    }

    public static function search($query, $categoryId)
    {
        return self::where('name', 'LIKE', "%{$query}%")
            ->WhereHas('category', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
    }

    public static function ajaxSearch($query)
    {
        return self::where('name', 'LIKE', "%{$query}%")
            ->orWhereHas('author', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            });
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

}
