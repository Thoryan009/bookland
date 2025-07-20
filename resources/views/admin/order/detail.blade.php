@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <div class="card card-body">
                <h4>Order Basic Information</h4>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Order Id</th>
                        <td>{{$order->id}}</td>
                    </tr>
                    <tr>
                        <th>Order Date</th>
                        <td>{{$order->order_date}}</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>{{$order->order_status}}</td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td>{{$order->order_total}}</td>
                    </tr>
                    <tr>
                        <th>Tax Total</th>
                        <td>{{$order->tax_total}}</td>
                    </tr>
                    <tr>
                        <th>Shipping Total</th>
                        <td>{{$order->shipping_total}}</td>
                    </tr>
                    <tr>
                        <th>Delivery Address</th>
                        <td>{{$order->delivery_address}}</td>
                    </tr>
                    <tr>
                        <th>Delivery Date</th>
                        <td>{{$order->delivery_date}}</td>
                    </tr>
                    <tr>
                        <th>Delivery Status</th>
                        <td>{{$order->delivery_status}}</td>
                    </tr>
                    <tr>
                        <th>Payment method</th>
                        <td>{{$order->payment_method}}</td>
                    </tr>
                    <tr>
                        <th>Payment Date</th>
                        <td>{{$order->payment_date}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{$order->payment_status}}</td>
                    </tr>
                    <tr>
                        <th>Customer Info</th>
                        <td>
                            <b>Name: </b>{{$order->customer->name}}<br>
                            <b>Mobile: </b>{{$order->customer->mobile}}<br>
                        </td>
                    </tr>
                    <tr>
                        <th>Currency</th>
                        <td>{{$order->currency}}</td>
                    </tr>
                    <tr>
                        <th>Transaction Id</th>
                        <td>{{$order->transaction_id}}</td>
                    </tr>
                    <tr>
                        <th>Courier Info</th>
                        <td>
                            @if($order->courier_id == 1)
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
                        <td>{{$order->shipping_total}}</td>
                    </tr>
                </table>
            </div>
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
                            <th>Seller Name</th>
                            <th>Courier Choosen by seller</th>
                            <th>Delivery Status of Seller</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($order->orderDetail as $orderDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td>{{ $orderDetail->product_price * $orderDetail->product_qty}}</td>
                              @if($orderDetail->seller_id)
                              <td>{{ $orderDetail->seller->name ?? 'NA'  }}</td>
                                <td>{{ $orderDetail->courier ? $orderDetail->courier->name : 'No Courier Assigned by Seller'}}</td>
                                <td>{{ $orderDetail->delivery_status_seller}}</td>
                                <td><a class="btn btn-primary" href="{{route('admin.customer.order-edit', ['id' => $orderDetail->id])}}">Edit</a></td>
                              @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
