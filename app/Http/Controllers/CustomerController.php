<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerController extends Controller
{
    public function customerOrder($customer_id)
    {
        return view('customer.order.index', [
            'customer_orders' => Order::where('customer_id', $customer_id)->latest()->get()
        ]);
    }

    public function customerOrderDetail($order_id)
    {
        return view('customer.order.detail', [
            'customer_order_details' => OrderDetail::where('order_id', $order_id)->get()
        ]);
    }

    public function customerCancelOrder($order_id)
    {
        Order::cancelOrder($order_id);
        return back()->with('message', 'Order Cancel Successfully.');
    }

    public function customerProfile()
    {
        $customer_Id = Auth::guard('customer')->user()->id;
        return view('customer.profile.index', [
            'customer' => Customer::find($customer_Id)
        ]);
    }

    public function customerUpdate(Request $request,$id)
    {
        Customer::updateCustomer($request, $id);
        return back()->with('message', 'Profile Update Successfully.');
    }
}
