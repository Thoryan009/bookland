<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Seller;
use App\Models\Order;
// use Carbon;
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
// use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

  $todayDate = Carbon::today();
                $totalOrders = Order::count();
                $todayOrders = Order::whereDate('created_at', $todayDate)->count();
                $todayDeliveredOrders = Order::whereDate('updated_at', $todayDate)->where('order_status', 'Complete')->count();
                $todayCancelledOrders = Order::whereDate('updated_at', $todayDate)->where('order_status', 'Cancel')->count();
                $todayTotalDeliveredOrderDetails = Order::whereDate('updated_at', $todayDate)->where('order_status', 'Complete')->with('orderDetail')->get();
                //dd($todayTotalDeliveredOrderDetails);
                $totalQty = 0;

                // Loop through each order and sum the quantities of its orderDetails
                foreach ($todayTotalDeliveredOrderDetails as $order) {
                        foreach ($order->orderDetails as $detail) {
                        $totalQty += $detail->qty;
                    }
                }
                $todayTotalDeliveredPieces = $totalQty;
                $pendingOrders = Order::where('order_status', 'Pending')->count();
                $cancelledOrders = Order::where('order_status', 'Cancel')->count();
                $confirmedOrders = Order::where('order_status', 'Processing')->count();
                $deliveredOrders = Order::where('order_status', 'Complete')->count();

                $customers = Customer::all();
                $sellers = Seller::all();
                return view ('admin.dashboard.index', compact('totalOrders', 'todayOrders', 'pendingOrders', 'cancelledOrders', 'confirmedOrders', 'deliveredOrders', 'todayDeliveredOrders', 'todayCancelledOrders', 'todayTotalDeliveredPieces', 'customers', 'sellers'));






        return view('admin.dashboard.index', [
            'customers' => Customer::all(),
            'sellers' => Seller::all(),

        ]);
    }
}
