<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public static $language;



    public static function newLanguage($request)
    {
        self::$language = new Language();

        self::$language->name = $request->name;
        self::$language->status = $request->status;

        self::$language->save();
    }

    public static function updateLanguage($request, $id)
    {
        self::$language = Language::find($id);

        self::$language->name = $request->name;
        self::$language->status = $request->status;

        self::$language->save();
    }

    public static function deleteLanguage($id)
    {
        self::$language = Language::find($id);

        self::$language->delete();
    }
}
