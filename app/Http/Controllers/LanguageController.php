<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return view('admin.language.index', ['languages' =>  Language::latest()->get()]);
    }

    public function create()
    {
        return view('admin.language.create');
    }

    public function store(Request $request)
    {
        Language::newLanguage($request);
        return back()->with('message', 'Language Add Successfully');
    }

    public function edit($id)
    {
        return view('admin.language.edit', ['language' => Language::find($id)]);
    }

    public function update(Request $request, $id)
    {
        language::updateLanguage($request, $id);
        return redirect('/language/index')->with('message', 'Language Update Successfully');
    }

    public function delete($id)
    {
        language::deleteLanguage($id);
        return back()->with('delete-message', 'Language Deleted Successfully');
    }
}
