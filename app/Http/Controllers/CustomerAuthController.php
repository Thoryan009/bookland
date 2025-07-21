<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Session;


class CustomerAuthController extends Controller
{
    private $customer;

    public function index()
    {
        return view('customer.auth.login.index');
    }

    public function registration()
    {
        return view('customer.auth.registration.index');
    }

    public function newCustomer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
               
                Password::min(8)
                    ->mixedCase()      // upper + lower case
                    ->letters()        // must contain letters
                    ->numbers()        // must contain numbers
                    ->symbols()        // must contain symbols
                    ->uncompromised(), // check against leaked passwords
            ],
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', // 2048 KB = 2MB
            'mobile' => 'required|digits:11|numeric|unique:customers,mobile',
        ]);

        $this->customer = Customer::newCustomer($validated);
        $credentials = $request->only('email', 'password');
        Auth::guard('customer')->attempt($credentials);

        return redirect('/checkout/index');
    }

    public function customerLogin(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        $credentials = $request->validate([
            'email' => 'required|email|exists:customers,email',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect('/checkout/index');
        } else {
            return back()->with('message', 'Email address is invalid.');
        }
    }

    public function customerLogout()
    {
        Auth::guard('seller')->logout();
        Auth::guard('customer')->logout();

        return redirect('/');
    }
}
