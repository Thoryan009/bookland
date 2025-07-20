<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Session;

class Order extends Model
{
    public static $order;

    public static function newOrder($request)
    {
        self::$order = new Order();

        self::$order->customer_id = Auth::guard('customer')->user()->id;
        self::$order->order_total = $request->order_total;
        self::$order->tax_total = $request->tax_total;
        self::$order->shipping_total = $request->shipping_total;
        self::$order->order_date = date('Y-m-d');
        self::$order->order_timestamp = strtotime(date('Y-m-d'));
        self::$order->delivery_address = $request->delivery_address;
        self::$order->payment_method = $request->payment_method;
        self::$order->save();

        return self::$order->id;
    }

    public static function cancelOrder($order_id)
    {
        self::$order = Order::find($order_id);
        self::$order->order_status = "Cancel";
        self::$order->payment_status = "Cancel";
        self::$order->delivery_status = "Cancel";
        self::$order->save();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public static function deleteOrder($id)
    {
        Order::find($id)->delete();
    }
}
