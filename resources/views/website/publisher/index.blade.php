@extends('website.master')

@section('title')
    {{$publisher->name}}
@endsection

@section('body')

    <div class="page-content bg-grey">
        <section class="content-inner-1">
            <div class="container">
                <div class="row book-grid-row style-4 m-b60">
                    <div class="col">
                        <div class="dz-box">
                            <div class="dz-media" style="min-width:0">
                                <img src="{{asset($publisher->image)}}" style="width: 100px; height: 100px;" alt="book">
                            </div>
                            <div class="dz-content">
                                <div class="dz-header">
                                    <h3 class="title">{{$publisher->name}}</h3>
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
                                <li><a data-bs-toggle="tab" href="#graphic-design-1" class="active">Publisher Description</a></li>
                                <li><a data-bs-toggle="tab" href="#developement-1">Customer Reviews</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="graphic-design-1" class="tab-pane show active">
                                    <div class="card card-body">
                                        {!! $publisher->description !!}
                                    </div>
                                </div>
                                <div id="developement-1" class="tab-pane">
                                    <div class="clear" id="comment-list">
                                        <div class="post-comments comments-area style-1 clearfix">
                                            <h4 class="comments-title">4 COMMENTS</h4>
                                            <div id="comment">
                                                <ol class="comment-list">
                                                    <li class="comment even thread-even depth-1 comment" id="comment-2">
                                                        <div class="comment-body">
                                                            <div class="comment-author vcard">
                                                                <img src="{{asset('/')}}website/images/profile4.jpg" alt="" class="avatar"/>
                                                                <cite class="fn">Michel Poe</cite> <span class="says">says:</span>
                                                                <div class="comment-meta">
                                                                    <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content dlab-page-text">
                                                                <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                                            </div>
                                                            <div class="reply">
                                                                <a rel="nofollow" class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                        <ol class="children">
                                                            <li class="comment byuser comment-author-w3itexpertsuser bypostauthor odd alt depth-2 comment" id="comment-3">
                                                                <div class="comment-body" id="div-comment-3">
                                                                    <div class="comment-author vcard">
                                                                        <img src="{{asset('/')}}website/images/profile3.jpg" alt="" class="avatar"/>
                                                                        <cite class="fn">Celesto Anderson</cite> <span class="says">says:</span>
                                                                        <div class="comment-meta">
                                                                            <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-content dlab-page-text">
                                                                        <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <a class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="comment even thread-odd thread-alt depth-1 comment" id="comment-4">
                                                        <div class="comment-body" id="div-comment-4">
                                                            <div class="comment-author vcard">
                                                                <img src="{{asset('/')}}website/images/profile2.jpg" alt="" class="avatar"/>
                                                                <cite class="fn">Ryan</cite> <span class="says">says:</span>
                                                                <div class="comment-meta">
                                                                    <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content dlab-page-text">
                                                                <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                                            </div>
                                                            <div class="reply">
                                                                <a class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment odd alt thread-even depth-1 comment" id="comment-5">
                                                        <div class="comment-body" id="div-comment-5">
                                                            <div class="comment-author vcard">
                                                                <img src="{{asset('/')}}website/images/profile1.jpg" alt="" class="avatar"/>
                                                                <cite class="fn">Stuart</cite> <span class="says">says:</span>
                                                                <div class="comment-meta">
                                                                    <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content dlab-page-text">
                                                                <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                                            </div>
                                                            <div class="reply">
                                                                <a rel="nofollow" class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                            <div class="default-form comment-respond style-1" id="respond">
                                                <h4 class="comment-reply-title" id="reply-title">LEAVE A REPLY <small> <a rel="nofollow" id="cancel-comment-reply-link" href="javascript:void(0)" style="display:none;">Cancel reply</a> </small></h4>
                                                <div class="clearfix">
                                                    <form method="post" id="comments_form" class="comment-form" novalidate>
                                                        <p class="comment-form-author"><input id="name" placeholder="Author" name="author" type="text" value=""></p>
                                                        <p class="comment-form-email"><input id="email" required="required" placeholder="Email" name="email" type="email" value=""></p>
                                                        <p class="comment-form-comment"><textarea id="comments" placeholder="Type Comment Here" class="form-control4" name="comment" cols="45" rows="3" required="required"></textarea></p>
                                                        <p class="col-md-12 col-sm-12 col-xs-12 form-submit">
                                                            <button id="submit" type="submit" class="submit btn btn-primary filled">
                                                                Submit Now <i class="fa fa-angle-right m-l10"></i>
                                                            </button>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mt-5 mt-xl-0">
                        <div class="widget">
                            <h4 class="widget-title">{{$publisher->name}}’র বই</h4>
                        </div>
                        <div class="row book-grid-row">
                            @foreach($publisher->book as $book)
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
                                                @foreach(json_decode($book->tags) as $tag)
                                                    <li><a href="books-grid-view.html">{{$tag}},</a></li>
                                                @endforeach
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
