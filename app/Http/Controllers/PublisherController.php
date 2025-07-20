<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return view('admin.publisher.index', ['publishers' =>  Publisher::latest()->get()]);
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        Publisher::newPublisher($request);
        return back()->with('message', 'Publisher Add Successfully');
    }

    public function edit($id)
    {
        return view('admin.publisher.edit', ['publisher' => Publisher::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Publisher::updatePublisher($request, $id);
        return redirect('/publisher/index')->with('message', 'Publisher Update Successfully');
    }

    public function delete($id)
    {
        Publisher::deletePublisher($id);
        return back()->with('delete-message', 'Publisher Deleted Successfully');
    }
}
