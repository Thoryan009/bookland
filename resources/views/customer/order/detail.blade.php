@extends('website.master')

@section('title')
    Order Detail Page
@endsection

@section('body')


    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{asset('/')}}website/images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Order Detail</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item">Order Detail</li>
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
                                        <th>Product</th>
                                        <th>Product name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customer_order_details as  $customer_order_detail)
                                        <tr>
                                            <td class="product-item-img">{{$loop->iteration}}</td>
                                            <td class="product-item-img"><img src="{{asset($customer_order_detail->book->image)}}" alt=""></td>
                                            <td class="product-item-name"><a href="{{route('product-detail', ['id' => $customer_order_detail->book->id])}}">{{$customer_order_detail->book->name}}</a></td>
                                            <td class="product-item-price">BDT {{$customer_order_detail->product_price}}/-</td>
                                            <td class="product-item-quantity">
                                                <div class="quantity btn-quantity style-1 me-3">
                                                    <input id="demo_vertical2" class="quantity-input" type="text" value="{{$customer_order_detail->product_qty}}" readonly/>
                                                </div>
                                            </td>
                                            <td class="product-item-totle">BDT {{$customer_order_detail->product_price * $customer_order_detail->product_qty}}/-</td>
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

