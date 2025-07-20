@extends('website.master')

@section('title')
    Wishlist Page
@endsection

@section('body')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{asset('/')}}website/images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Wishlist</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item">Wishlist</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- inner page banner End-->
        <div class="content-inner-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center text-success">{{session('message')}}</p>
                        <p class="text-center text-danger">{{session('delete-message')}}</p>
                        <div class="table-responsive">
                            <table class="table check-tbl">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Product name</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Add to cart </th>
                                    <th>Close</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlist_items as $wishlist_item)
                                <tr>
                                    <td class="product-item-img"><img src="{{asset($wishlist_item->options->image)}}" alt=""></td>
                                    <td class="product-item-name"><a href="{{route('product-detail', ['id' => $wishlist_item->id
])}}" style="color: #1A1A71">{{$wishlist_item->name}}</a></td>
                                    <td class="product-item-price">BDT {{$wishlist_item->price}}</td>
                                    <td class="product-item-quantity">
                                        <div class="quantity btn-quantity style-1 me-3">
                                            <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                                        </div>
                                    </td>
                                    <td class="product-item-totle"><a href="{{route('cart.direct-add', ['id' => $wishlist_item->id])}}" class="btn btn-primary btnhover">Add To Cart</a></td>
                                    <td class="product-item-close"><a href="{{route('wishlist.delete', ['id' => $wishlist_item->rowId
])}}" class="ti-close"></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
