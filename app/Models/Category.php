<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public static $image, $imageName, $directory, $imageUrl, $category;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCategory($request)
    {
        self::$category = new Category();

        self::$category->name = $request->name;
        self::$category->status = $request->status;
        self::$category->image = Category::getImageUrl($request);
        self::$category->description = $request->description;
        self::$category->save();
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        if (file_exists($request->file('image')))
        {
            self::$imageUrl = Category::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }

        self::$category->name = $request->name;
        self::$category->status = $request->status;
        self::$category->image = self::$imageUrl;
        self::$category->description = $request->description;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);

        $subCategory = SubCategory::where('category_id', $id)->first();

        $subCategoryId = $subCategory->id;

        if (self::$category->image)
        {
            unlink(self::$category->image);
        }

        self::$category->delete();

        return $subCategoryId;
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
