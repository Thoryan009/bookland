@extends('website.master')

@section('title')
   Order Successful
@endsection

@section('body')

    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{asset('/')}}website/images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Complete Order</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item">Complete Order</li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <p class="text-success text-center">{{session('message')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </section>
        <!-- contact area End-->
    </div>

@endsection
