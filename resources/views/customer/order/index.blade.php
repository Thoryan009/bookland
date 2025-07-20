@extends('website.master')

@section('title')
    My Order Page
@endsection

@section('body')


    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{asset('/')}}website/images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>My Order</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item">My Order</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- inner page banner End-->

        <!-- contact area -->
        <section class="content-inner shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <form action="" method="POST">
                            @csrf
                            <p class="text-center text-success">{{session('message')}}</p>
                            <p class="text-center text-danger">{{session('delete-message')}}</p>
                            <div class="table-responsive">
                                <table class="table check-tbl">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Product</th>
                                        <th>Order Total</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($total = 0)
                                    @foreach($customer_orders as $customer_order)
                                        <tr>
                                            @foreach($customer_order->orderDetail as $order_product)
                                                <?php
                                                $order_count = $loop->iteration;
                                                ?>
                                            @endforeach
                                            <td class="product-item-img">{{$loop->iteration}}</td>
                                            <td class="product-item-img">{{$customer_order->id}}</td>
                                            <td class="product-item-name">{{$order_count}}</td>
                                            <td class="product-item-price">BDT {{$customer_order->order_total}}/-</td>
                                            <td class="product-item-price"><span style="background-color: {{$customer_order->order_status=='Complete' ? 'green' : ''}} {{$customer_order->order_status=='Processing' ? '#0CB6D8' : ''}} {{$customer_order->order_status=='Cancel' ? 'red' : ''}}" class="badge text-bg-success">{{$customer_order->order_status}}</span></td>
                                            <td class="product-item-price"><span style="background-color: {{$customer_order->payment_status=='Complete' ? 'green' : ''}} {{$customer_order->payment_status=='Processing' ? '#0CB6D8' : ''}} {{$customer_order->payment_status=='Cancel' ? 'red' : ''}}" class="badge text-bg-success">{{$customer_order->payment_status}}</span></td>
                                            <td class="product-item-price"><span style="background-color: {{$customer_order->delivery_status=='Complete' ? 'green' : ''}} {{$customer_order->delivery_status=='Processing' ? '#0CB6D8' : ''}} {{$customer_order->delivery_status=='Cancel' ? 'red' : ''}}" class="badge text-bg-success">{{$customer_order->delivery_status}}</span></td>
                                            <td class="product-item-close">
                                                <a href="{{route('customer.customer-orderDetail', ['id' => $customer_order->id])}}" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{route('customer.customer-cancelOrder', ['id' => $customer_order->id])}}" onclick="return confirm('Are You Sure? Order Cancel?')" class="ti-close"></a>
                                            </td>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <!-- Product END -->
        </section>
        <!-- contact area End-->

    </div>


@endsection
