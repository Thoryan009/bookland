@extends('website.master')

@section('title')
    {{$book->name}}
@endsection

@section('body')

    <div class="page-content bg-grey">
        <section class="content-inner-1">
            <div class="container">
                <div class="row book-grid-row style-4 m-b60">
                    <div class="col">
                        <div class="dz-box">
                            <div class="dz-media">
                                <img src="{{asset($book->image)}}" alt="book">
                                <div class="mt-2">
                                   <div class="row">
                                     @foreach ($book->otherImages as $otherImage)
                                         <img style="width: 120px; height: 100px"  src="{{asset($otherImage->image)}}" alt="book">
                                    @endforeach
                                   </div>
                                </div>
                            </div>
                            <div class="dz-content">
                                <div class="dz-header">
                                    <h3 class="title">{{$book->name}}</h3>
                                    <h6>Added By: {{$book->seller->name}}</h6>
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
                                <div class="dz-body">
                                    <div class="book-detail">
                                        <ul class="book-info">
                                            <li>
                                                <div class="writer-info">
                                                    
                                                    <div>
                                                        <span>Writen by</span><a style="color: #1a1668" href="">{{$book->author_name}}</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><span>Publisher</span><a style="color: #1a1668" href="">{{$book->publisher_name}}</a></li>
                                            <li><span>Year</span>{{$book->published_date}}</li>
                                        </ul>
                                    </div>
                                    <p class="text-1">{{$book->short_description}}</p>

                                    <div class="book-footer">
                                        <div class="price">
                                            <h5>BDT {{$book->selling_price}}</h5>
                                            <p class="p-lr10">BDT {{$book->original_price}}</p>
                                        </div>
                                        <form action="{{route('cart.add.from.seller.book', ['id' => $book->id])}}" method="POST">
                                            @csrf
                                        <div class="product-num">
                                            <div class="quantity btn-quantity style-1 me-3">
                                                <input id="demo_vertical2" class="quantity-input" type="number" value="1" name="qty"/>
                                            </div>
                                            <button type="submit" class="btn btn-primary btnhover btnhover2"><i class="flaticon-shopping-cart-1"></i> <span>Add to cart</span></button>
                                            <div class="bookmark-btn style-1 d-none d-sm-block">
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    <i class="flaticon-heart"></i>
                                                </label>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-8">
                        <div class="product-description tabs-site-button">
                            <ul class="nav nav-tabs">
                                <li><a data-bs-toggle="tab" href="#detail-book" class="active">Details Book</a></li>
                                <li><a data-bs-toggle="tab" href="#book-description">Book Description</a></li>
                                
                            </ul>
                            <div class="tab-content">
                                <div id="detail-book" class="tab-pane show active">
                                    <table class="table border book-overview">
                                        <tr>
                                            <th>Book Title</th>
                                            <td>{{$book->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Author</th>
                                            <td>{{$book->author_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>ISBN</th>
                                            <td>{{$book->isbn}}</td>
                                        </tr>
                                        <tr>
                                            <th>Ediiton Language</th>
                                            <td>{{$book->language_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Book Format</th>
                                            <td>{{$book->format==0 ? 'Hardcover' : 'Paperback'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Published</th>
                                            <td>{{$book->published_date}}</td>
                                        </tr>
                                        <tr>
                                            <th>Publisher</th>
                                            <td>{{$book->publisher_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Pages</th>
                                            <td>{{$book->pages}}</td>
                                        </tr>
                                        <tr>
                                            <th>Topic</th>
                                            <td>
                                                @foreach(json_decode($book->tags) as $tag)
                                                    {{$tag}},
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr class="tags">
                                            <th>Tags</th>
                                            <td>
                                                @foreach(json_decode($book->tags) as $tag)
                                                <a href="javascript:void(0);" class="badge">{{$tag}}</a>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="book-description" class="tab-pane">
                                    <div class="card card-body">
                                        {!! $book->long_description !!}
                                    </div>
                                </div>
                               
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
