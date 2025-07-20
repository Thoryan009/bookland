<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderDetail extends Model
{
    public static $orderDetail, $orderDetails, $balance;

    public static function newOrderDetail($orderId)
    {
        foreach (Cart::content() as $item)
        {
            self::$orderDetail = new OrderDetail();

            self::$orderDetail->order_id = $orderId;
            self::$orderDetail->product_id = $item->id;
            self::$orderDetail->product_name = $item->name;
            self::$orderDetail->product_price = $item->price;
            self::$orderDetail->product_qty = $item->qty;

            if($item->options->seller_id)
            {
                self::$orderDetail->seller_id = $item->options->seller_id;
                self::$orderDetail->delivery_status_seller = 'Pending';
            }

            self::$orderDetail->save();

            $balance = new Balance();
            $balance->order_details_id =   self::$orderDetail->id;

            if($item->options->seller_id)
            {
                $balance->seller_id = $item->options->seller_id;
                $balance->seller_balance =  $item->price;

            }
            else{
                $balance->admin_balance = $item->price;
            }
            $balance->save();

          Cart::remove($item->rowId);
        }
         
    }

    public static function deleteOrderDetail($id)
    {
        self::$orderDetails = OrderDetail::where('order_id', $id)->get();
        foreach (self::$orderDetails as $orderDetail)
        {
            $orderDetail->delete();
        }
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'product_id');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id_seller', 'id');
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'id');
    }


}
