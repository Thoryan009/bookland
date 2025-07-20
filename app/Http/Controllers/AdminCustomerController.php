<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.index', [
            'customers' => Customer::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::newCustomer($request);
        return back()->with('message', 'Customer Info add successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.customer.detail', [
            'customer' => Customer::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.customer.edit', [
            'customer' => Customer::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Customer::updateCustomer($request,$id);
        return back()->with('message', 'Customer Info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::deleteCustomer($id);
        return back()->with('delete-message', 'Customer Delete successfully.');
    }
}
