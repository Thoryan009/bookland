<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public static $courier, $image, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/courier-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCourier($request)
    {
        self::$courier = new Courier();
        self::$courier->name = $request->name;
        self::$courier->email = $request->email;
        self::$courier->mobile = $request->mobile;
        if ($request->file('image'))
        {
            self::$courier->image = self::getImageUrl($request);
        }
        self::$courier->address = $request->address;
        self::$courier->save();
    }

    public static function updateCourier($request, $id)
    {
        self::$courier = Courier::find($id);

        self::$courier->name = $request->name;
        self::$courier->email = $request->email;
        self::$courier->mobile = $request->mobile;
        if ($request->file('image'))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$courier->image;
        }
        self::$courier->image = self::$imageUrl;
        self::$courier->address = $request->address;
        self::$courier->save();

    }

    public static function deleteCourier($id)
    {
        self::$courier = Courier::find($id);

        if (self::$courier->image)
        {
            unlink(self::$courier->image);
        }
        self::$courier->delete();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

}
