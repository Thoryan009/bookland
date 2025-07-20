@extends('website.master')

@section('body')
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <section class="content-inner bg-white">
                <div class="container">
                    <div class="row">
                        @include('seller.includes')
                        <div class="col-xl-9 col-lg-8 m-b30">
                            <p class="text-success text-center">{{ session('message') }}</p>
                            <Caption >Customer Order Details</Caption>
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Order Id</th>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>{{ $order->order_status }}</td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td>{{ $order->order_total }}</td>
                                </tr>
                                <tr>
                                    <th>Tax Total</th>
                                    <td>{{ $order->tax_total }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Total</th>
                                    <td>{{ $order->shipping_total }}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Address</th>
                                    <td>{{ $order->delivery_address }}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Date</th>
                                    <td>{{ $order->delivery_date }}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Status</th>
                                    <td>{{ $order->delivery_status }}</td>
                                </tr>
                                <tr>
                                    <th>Payment method</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Date</th>
                                    <td>{{ $order->payment_date }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>{{ $order->payment_status }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Info</th>
                                    <td>
                                        <b>Name: </b>{{ $order->customer->name }}<br>
                                        <b>Mobile: </b>{{ $order->customer->mobile }}<br>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Currency</th>
                                    <td>{{ $order->currency }}</td>
                                </tr>
                                <tr>
                                    <th>Transaction Id</th>
                                    <td>{{ $order->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Courier Info</th>
                                    <td>
                                        @if ($order->courier_id == 1)
                                            SA Poribahan
                                        @elseif($order->courier_id == 2)
                                            Korotoa
                                        @elseif($order->courier_id == 3)
                                            Sundarbahan
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping Total</th>
                                    <td>{{ $order->shipping_total }}</td>
                                </tr>
                            </table>

                            <div>
                                <div class="card p-5 mt-5">
                                    <h4>Order Product Information</h4>
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Product Name</th>
                                                    <th>Product Price</th>
                                                    <th>Product Quantity</th>
                                                    <th>Total Price</th>
                                                    <th>Courier Info</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                  @php
                                                       $serial = 1;
                                                   
                                                   @endphp
                                                @foreach ($order->orderDetail as $orderDetail)
                                                   @if($orderDetail->seller_id != null && $orderDetail->seller_id == Auth::guard('seller')->user()->id)
                                                  
                                                 <tr>
                                                        <td>{{ $serial }}</td>
                                                        <td>{{ $orderDetail->product_name }}</td>
                                                        <td>{{ $orderDetail->product_price }}</td>
                                                        <td>{{ $orderDetail->product_qty }}</td>
                                                        <td>{{ $orderDetail->product_price * $orderDetail->product_qty }}
                                                        <td>{{ $orderDetail->courier ? $orderDetail->courier->name : 'No Courier Assigned Yet'}}
                                                        </td>
                                                       <td><a class="btn btn-primary" href="{{route('seller.customer.order.edit', ['id' => $orderDetail->id])}}">Edit</a></td>
                                                    </tr>
                                                     @php
                                                   
                                                       $serial++;
                                                   @endphp
                                                   @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Browse Jobs END -->
        </div>
    </div>
@endsection
