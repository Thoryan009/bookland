@extends('website.master')

@section('title')
    Cart Page
@endsection

@section('body')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm"
            style="background-image:url({{ asset('/') }}website/images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Cart</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
                            <li class="breadcrumb-item">Cart</li>
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
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <p class="text-center text-success">{{ session('message') }}</p>
                            <p class="text-center text-danger">{{ session('delete-message') }}</p>
                            <div class="table-responsive">
                                <table class="table check-tbl">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Product name</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th class="text-end">Close</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($total = 0)
                                        @foreach ($cart_items as $key => $cart_item)
                                            <tr>
                                                <td class="product-item-img"><img
                                                        src="{{ asset($cart_item->options->image) }}" alt=""></td>
                                                <td class="product-item-name"><a
                                                        href="{{ route('product-detail', ['id' => $cart_item->id]) }}">{{ $cart_item->name }}</a>
                                                </td>
                                                <td class="product-item-price">BDT {{ $cart_item->price }}/-</td>
                                                <td class="product-item-quantity">
                                                    <div class="quantity btn-quantity style-1 me-3">
                                                        <input id="" type="hidden" value="{{ $cart_item->rowId }}"
                                                            name="qty[{{ $key }}][rowId]" />
                                                        <input id="demo_vertical2" class="quantity-input" type="text"
                                                            value="{{ $cart_item->qty }}"
                                                            name="qty[{{ $key }}][qty]" />
                                                    </div>
                                                </td>
                                                <td class="product-item-totle">BDT
                                                    {{ $cart_item->price * $cart_item->qty }}/-</td>
                                                <td class="product-item-close"><a
                                                        href="{{ route('cart.delete', ['id' => $cart_item->rowId]) }}"
                                                        class="ti-close"></a></td>
                                            </tr>
                                            @php($total = $total + $cart_item->price * $cart_item->qty)
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="row">
                                <label for="" class="col-md-10"></label>
                                <button class="btn btn-primary btnhover mt-3 col-md-2 me-2" type="submit">Update
                                    Cart</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="widget">
                            <form class="shop-form">
                                <h4 class="widget-title">Calculate Shipping</h4>
                                <div class="form-group">
                                    <select class="default-select">
                                        <option selected>Credit Card Type</option>
                                        <option value="1">Another option</option>
                                        <option value="2">A option</option>
                                        <option value="3">Potato</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control" placeholder="Credit Card Number">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control" placeholder="Card Verification Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Coupon Code">
                                </div>
                                <div class="form-group">
                                    <a href="shop-cart.html" class="btn btn-primary btnhover" type="button">Apply
                                        Coupon</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="widget">
                            <h4 class="widget-title">Cart Subtotal</h4>
                            <table class="table-bordered check-tbl m-b25">
                                <tbody>
                                    <tr>
                                        <td>Order Subtotal</td>
                                        <td>BDT {{ $total }}/-</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>BDT {{ $shipping = 100 }}/-</td>
                                    </tr>
                                  
                                    <tr>
                                        <td>Coupon</td>
                                        <td>BDT 0/-</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>BDT {{ $total + $shipping }}/-</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group m-b25">
                                <a href="{{ route('checkout.index') }}" class="btn btn-primary btnhover"
                                    type="button">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </section>
        <!-- contact area End-->

    </div>
@endsection
