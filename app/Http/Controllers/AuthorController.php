<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('admin.author.index', ['authors' =>  Author::latest()->get()]);
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        Author::newAuthor($request);
        return back()->with('message', 'Author Add Successfully');
    }

    public function edit($id)
    {
        return view('admin.author.edit', ['author' => Author::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Author::updateAuthor($request, $id);
        return redirect('/author/index')->with('message', 'Author Update Successfully');
    }

    public function delete($id)
    {
        Author::deleteAuthor($id);
        return back()->with('delete-message', 'Author Deleted Successfully');
    }
}
