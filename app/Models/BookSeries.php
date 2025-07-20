<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookSeries extends Model
{
    public static $bookSeries;



    public static function newBookSeries($request)
    {
        self::$bookSeries = new BookSeries();

        self::$bookSeries->author_id = $request->author_id;
        self::$bookSeries->name = $request->name;
        self::$bookSeries->description = $request->description;
        self::$bookSeries->status = $request->status;

        self::$bookSeries->save();
    }

    public static function updateBookSeries($request, $id)
    {
        self::$bookSeries = BookSeries::find($id);

        self::$bookSeries->author_id = $request->author_id;
        self::$bookSeries->name = $request->name;
        self::$bookSeries->description = $request->description;
        self::$bookSeries->status = $request->status;

        self::$bookSeries->save();
    }

    public static function deleteBookSeries($id)
    {
        self::$bookSeries = BookSeries::find($id);

        self::$bookSeries->delete();
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
