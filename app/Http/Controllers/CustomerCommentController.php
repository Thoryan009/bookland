<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CustomerCommentController extends Controller
{
    public function commentStore(Request $request)
    {
        Comment::newComment($request);
        return back()->with('message', 'Comment Add Successfully.');
    }
}
