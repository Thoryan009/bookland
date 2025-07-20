@extends('website.master')

@section('title')
    Checkout Page
@endsection

@section('body')

    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{asset('/')}}website/images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Checkout</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item">Checkout</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- inner page banner End-->

        <!-- contact area -->
        <section class="content-inner-1">
            <!-- Product -->
            <div class="container">

                <div class="dz-divider bg-gray-dark text-gray-dark icon-center  my-5"><i class="fa fa-circle bg-white text-gray-dark"></i></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="widget">
                            <h4 class="widget-title">Your Order</h4>
                            <table class="table-bordered check-tbl text-center">
                                <thead class="text-center">
                                <tr>
                                    <th>IMAGE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRODUCT QTY</th>
                                    <th>PRODUCT PRICE</th>
                                    <th>TOTAL</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sum = 0)
                                @foreach($cart_items as $cart_item)
                                <tr>
                                    <td class="product-item-img"><img src="{{asset($cart_item->options->image)}}" alt=""></td>
                                    <td class="product-item-name"><a href="{{route('product-detail', ['id' => $cart_item->id])}}">{{$cart_item->name}}</a></td>
                                    <td class="product-price">{{$cart_item->qty}}</td>
                                    <td class="product-price">BDT {{$cart_item->price}}</td>
                                    <td class="product-price">BDT {{$cart_item->price * $cart_item->qty}}</td>
                                </tr>
                                    @php($sum = $sum + ($cart_item->price * $cart_item->qty))
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{route('checkout.new-order')}}" method="POST" class="shop-form">
                            @csrf
                            <div class="widget">
                                <h4 class="widget-title">Order Total</h4>
                                <table class="table-bordered check-tbl mb-4">
                                    <tbody>
                                    <tr>
                                        <td>Order Subtotal</td>
                                        <td class="product-price">BDT {{$sum}}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>BDT {{$shipping = 100}}</td>
                                    </tr>
                                    <tr>
                                        <td>Coupon</td>
                                        <td class="product-price">0</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="product-price-total">BDT {{$total = $sum + $shipping}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Payment Method</h4>
                                <div class="form-group">
                                    <select name="payment_method" class="default-select">
                                        <option value="Cash">Cash On Delivery</option>
                                        <option value="Online">Online</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" shop-form">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="widget">
                                            <h4 class="widget-title">Billing & Shipping Address</h4>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" name="delivery_address" placeholder="Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="order_total" value="{{$total}}">
                                <input type="hidden" name="tax_total" value="0">
                                <input type="hidden" name="shipping_total" value="{{$shipping}}">
                                <?php
                                Session::put('order_total', $total);
                                Session::put('shipping_total', $shipping);
                                ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btnhover" type="submit">Place Order Now </button>
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
