<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public static $image, $imageName, $directory, $imageUrl, $subCategory;


    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/sub-category-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
        self::$subCategory = new SubCategory();

        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->status = $request->status;
        self::$subCategory->image = self::getImageUrl($request);
        self::$subCategory->description = $request->description;
        self::$subCategory->save();

    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);

        if ($request->file('image'))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$subCategory->image;
        }

        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->status = $request->status;
        self::$subCategory->image = self::$imageUrl;
        self::$subCategory->description = $request->description;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);

        if (self::$subCategory->image)
        {
            unlink(self::$subCategory->image);
        }

        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
