@extends('website.master')

@section('title')
    Customer Order Page
@endsection

@section('body')
    <!-- Content -->
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
                            <div class="shop-bx shop-profile">
                                <div class="shop-bx-title clearfix">
                                    <h5 class="text-uppercase">Customer Order</h5>

                                </div>


                                <div class="card-datatable table-responsive pt-0">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Book Name</th>
                                                <th>Customer Name</th>
                                                <th>Order Date</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    @php
                                                        $serial = 1;

                                                    @endphp
                                                    <td>
                                                    @foreach ($order->orderDetail as $orderDetail)
                                                        @if ($orderDetail->seller_id != null && $orderDetail->seller_id == Auth::guard('seller')->user()->id)
                                                        {{ $serial }}.  {{ $orderDetail->product_name }} <br>
                                                            @php

                                                                $serial++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                        </td>
                                                    <td>{{ $order->customer->name }}</td>
                                                    <td>{{ $order->order_date }}</td>
                                                    <td>{{ $order->order_status }}</td>


                                                    <td>
                                                        <a href="{{ route('seller.customer.order.detail', ['id' => $order->id]) }}"
                                                            class="btn btn-info"><i class="fa-solid fa-eye"></i></a>

                                                        <a href="{{ route('seller.request.decline', ['id' => $order->id]) }}"
                                                            onclick=" return confirm('Are you sure to delete this!')"
                                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Browse Jobs END -->
        </div>
    </div>
    <!-- Content END-->
@endsection
