@extends('website.master')

@section('title')
    My Profile Page
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
                                    <h5 class="text-uppercase">Send Book To Our Office</h5>

                                </div>
                                <form action="{{ route('seller.customer.order.update', ['id' => $order->id]) }}" method="POST">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="" class="col-md-3">Book Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{ $order->product_name }}"
                                                readonly>
                                        </div>
                                    </div>
                                
                                    <div class="row mb-4">
                                        <label class="col-md-3">Courier Info</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="courier_id">
                                                <option value=""> -- Select Courier Info -- </option>
                                                @foreach ($couriers as $courier)
                                                    <option value="{{ $courier->id }}" @selected($courier->id == $order->courier_id)>
                                                        {{ $courier->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-primary">Update Order Status</button>
                                        </div>
                                    </div>
                                </form>
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
