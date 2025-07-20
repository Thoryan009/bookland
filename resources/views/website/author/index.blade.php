@extends('website.master')

@section('title')
    {{$author->name}}
@endsection

@section('body')

    <div class="page-content bg-grey">
        <section class="content-inner-1">
            <div class="container">
                <div class="row book-grid-row style-4 m-b60">
                    <div class="col">
                        <div class="dz-box">
                            <div class="dz-media" style="min-width:0">
                                <img src="{{asset($author->image)}}" style="width: 100px; height: 100px;" alt="book">
                            </div>
                            <div class="dz-content">
                                <div class="dz-header">
                                    <h3 class="title">{{$author->name}}</h3>
                                    <div class="shop-item-rating">
                                        <div class="d-lg-flex d-sm-inline-flex d-flex align-items-center">
                                            <ul class="dz-rating">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-muted"></i></li>
                                            </ul>
                                            <h6 class="m-b0">4.0</h6>
                                        </div>
                                        <div class="social-area">
                                            <ul class="dz-social-icon style-3">
                                                <li><a href="" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                                <li><a href="" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                                                <li><a href="" target="_blank"><i class="fa-solid fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 mb-5">
                        <div class="product-description tabs-site-button">
                            <ul class="nav nav-tabs">
                                <li><a data-bs-toggle="tab" href="#graphic-design-1" class="active">Author Description</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="graphic-design-1" class="tab-pane show active">
                                    <div class="card card-body">
                                        {!! $author->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mt-5 mt-xl-0">
                        <div class="widget">
                            <h4 class="widget-title">লেখকের বই</h4>
                        </div>
                            <div class="row book-grid-row">
                                @foreach($author->books as $book)
                                    <div class="col-book style-1">
                                        <div class="dz-shop-card style-1">
                                            <div class="dz-media">
                                                <a href="{{route('product-detail', ['id' => $book->id])}}"><img src="{{asset($book->image)}}" alt="book"></a>
                                            </div>
                                            <div class="bookmark-btn style-2">
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    <i class="flaticon-heart"></i>
                                                </label>
                                            </div>
                                            <div class="dz-content">
                                                <h5 class="title"><a href="{{route('product-detail', ['id' => $book->id])}}">{{$book->name}}</a></h5>
                                                <ul class="dz-tags">
                                                        <li><a href="{{route('author-detail', ['id' => $book->author_id])}}">{{$book->author->name}}</a></li>
                                                </ul>
                                                <ul class="dz-rating">
                                                    <li><i class="flaticon-star text-yellow"></i></li>
                                                    <li><i class="flaticon-star text-yellow"></i></li>
                                                    <li><i class="flaticon-star text-yellow"></i></li>
                                                    <li><i class="flaticon-star text-yellow"></i></li>
                                                    <li><i class="flaticon-star text-yellow"></i></li>
                                                </ul>
                                                <div class="book-footer">
                                                    <div class="price">
                                                        <span class="price-num">BDT {{$book->selling_price}}</span>
                                                        <del>BDT {{$book->regular_price}}</del>
                                                    </div>
                                                    <form action="{{route('cart.add', ['id' => $book->id])}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="qty" value="1">
                                                        <button type="submit" class="btn btn-secondary box-btn btnhover btnhover2"><i class="flaticon-shopping-cart-1 m-r10"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row page mt-0">
                                <div class="col-md-6">
                                    <p class="page-text">Showing 12 from 50 data</p>
                                </div>
                                <div class="col-md-6">
                                    <nav aria-label="Blog Pagination">
                                        <ul class="pagination style-1 p-t20">
                                            <li class="page-item"><a class="page-link prev" href="javascript:void(0);">Prev</a></li>
                                            <li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                            <li class="page-item"><a class="page-link next" href="javascript:void(0);">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Client Start-->
        <div class="bg-white py-5">
            <div class="container">
                <!--Client Swiper -->
                <div class="swiper client-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{asset('/')}}website/images/client/client1.svg" alt="client"></div>
                        <div class="swiper-slide"><img src="{{asset('/')}}website/images/client/client2.svg" alt="client"></div>
                        <div class="swiper-slide"><img src="{{asset('/')}}website/images/client/client3.svg" alt="client"></div>
                        <div class="swiper-slide"><img src="{{asset('/')}}website/images/client/client4.svg" alt="client"></div>
                        <div class="swiper-slide"><img src="{{asset('/')}}website/images/client/client5.svg" alt="client"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Client End-->

        <!-- Feature Box -->
        <section class="content-inner">
            <div class="container">
                <div class="row sp15">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="icon-bx-wraper style-2 m-b30 text-center">
                            <div class="icon-bx-lg">
                                <i class="fa-solid fa-users icon-cell"></i>
                            </div>
                            <div class="icon-content">
                                <h2 class="dz-title counter m-b0">125,663</h2>
                                <p class="font-20">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="icon-bx-wraper style-2 m-b30 text-center">
                            <div class="icon-bx-lg">
                                <i class="fa-solid fa-book icon-cell"></i>
                            </div>
                            <div class="icon-content">
                                <h2 class="dz-title counter m-b0">50,672</h2>
                                <p class="font-20">Book Collections</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="icon-bx-wraper style-2 m-b30 text-center">
                            <div class="icon-bx-lg">
                                <i class="fa-solid fa-store icon-cell"></i>
                            </div>
                            <div class="icon-content">
                                <h2 class="dz-title counter m-b0">1,562</h2>
                                <p class="font-20">Our Stores</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="icon-bx-wraper style-2 m-b30 text-center">
                            <div class="icon-bx-lg">
                                <i class="fa-solid fa-leaf icon-cell"></i>
                            </div>
                            <div class="icon-content">
                                <h2 class="dz-title counter m-b0">457</h2>
                                <p class="font-20">Famous Writers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature Box End -->

        <!-- Newsletter -->
        <section class="py-5 newsletter-wrapper" style="background-image: url('{{asset('/')}}website/images/background/bg1.jpg'); background-size: cover;">
            <div class="container">
                <div class="subscride-inner">
                    <div class="row style-1 justify-content-xl-between justify-content-lg-center align-items-center text-xl-start text-center">
                        <div class="col-xl-7 col-lg-12">
                            <div class="section-head mb-0">
                                <h2 class="title text-white my-lg-3 mt-0">Subscribe our newsletter for newest books updates</h2>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <form class="dzSubscribe style-1" action="https://bookland.dexignzone.com/xhtml/script/mailchamp.php" method="post">
                                <div class="dzSubscribeMsg"></div>
                                <div class="form-group">
                                    <div class="input-group mb-0">
                                        <input name="dzEmail" required="required" type="email" class="form-control bg-transparent text-white" placeholder="Your Email Address">
                                        <div class="input-group-addon">
                                            <button name="submit" value="Submit" type="submit" class="btn btn-primary btnhover">
                                                <span>SUBSCRIBE</span>
                                                <i class="fa-solid fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter End -->
    </div>

@endsection
