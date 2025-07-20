<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Author extends Model
{
    public static $image, $imageName, $imageUrl, $directory, $author;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/author-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function newAuthor($request)
    {
        self::$author = new Author();

        self::$author->name = $request->name;
        self::$author->status = $request->status;
        self::$author->image = Author::getImageUrl($request);
        self::$author->description = $request->description;

        self::$author->save();
    }

    public static function updateAuthor($request, $id)
    {
        self::$author = Author::find($id);

        if (file_exists($request->file('image')))
        {
            self::$imageUrl = Author::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$author->image;
        }

        self::$author->name = $request->name;
        self::$author->status = $request->status;
        self::$author->image = self::$imageUrl;
        self::$author->description = $request->description;

        self::$author->save();
    }

    public static function deleteAuthor($id)
    {
        self::$author = Author::find($id);

        if (file_exists(self::$author->image))
        {
            unlink(self::$author->image);
        }

        self::$author->delete();
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
