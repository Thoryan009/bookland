<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Session;

class Comment extends Model
{
    public static $comment;

    public static function newComment($request)
    {
        self::$comment = new Comment();

        self::$comment->customer_id         = Auth::guard('customer')->user()->id;
        self::$comment->book_id             = $request->book_id;
        self::$comment->comment             = $request->comment;
        self::$comment->comment_date        = date('y-m-d');
        self::$comment->comment_timestamp   = strtotime(date('y-m-d'));

        self::$comment->save();
    }

    public static function deleteComment($id)
    {
        self::$comment = Comment::find($id);
        self::$comment->delete();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
