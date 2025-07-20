<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public static $image, $imageName, $imageUrl, $directory, $publisher;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/publisher-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function newPublisher($request)
    {
        self::$publisher = new Publisher();

        self::$publisher->name = $request->name;
        self::$publisher->status = $request->status;
        self::$publisher->image = Publisher::getImageUrl($request);
        self::$publisher->description = $request->description;

        self::$publisher->save();
    }

    public static function updatePublisher($request, $id)
    {
        self::$publisher = Publisher::find($id);

        if (file_exists($request->file('image')))
        {
            self::$imageUrl = Publisher::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$publisher->image;
        }

        self::$publisher->name = $request->name;
        self::$publisher->status = $request->status;
        self::$publisher->image = self::$imageUrl;
        self::$publisher->description = $request->description;

        self::$publisher->save();
    }

    public static function deletePublisher($id)
    {
        self::$publisher = Publisher::find($id);

        if (file_exists(self::$publisher->image))
        {
            unlink(self::$publisher->image);
        }

        self::$publisher->delete();
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
