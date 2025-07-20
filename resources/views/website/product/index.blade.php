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
                            </div>
                            <div class="dz-content">
                                <div class="dz-header">
                                    <h3 class="title">{{$book->name}}</h3>
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
                                                    <img src="{{asset($book->author->image)}}" alt="book">
                                                    <div>
                                                        <span>Writen by</span><a style="color: #1a1668" href="{{route('author-detail', ['id' => $book->author_id])}}">{{$book->author->name}}</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><span>Publisher</span><a style="color: #1a1668" href="{{route('product-publisher', ['id' => $book->publisher_id])}}">{{$book->publisher->name}}</a></li>
                                            <li><span>Year</span>{{$book->published_date}}</li>
                                        </ul>
                                    </div>
                                    <p class="text-1">{{$book->short_description}}</p>

                                    <div class="book-footer">
                                        <div class="price">
                                            <h5>BDT {{$book->selling_price}}</h5>
                                            <p class="p-lr10">BDT {{$book->regular_price}}</p>
                                        </div>
                                        <form action="{{route('cart.add', ['id' => $book->id])}}" method="POST">
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
                                         <p class="my-2 text-danger fw-bold">{{session('error_message')}}</p>
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
                                <li><a data-bs-toggle="tab" href="#customer-review">Customer Reviews</a></li>
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
                                            <td>{{$book->author->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>ISBN</th>
                                            <td>{{$book->isbn}}</td>
                                        </tr>
                                        <tr>
                                            <th>Ediiton Language</th>
                                            <td>{{$book->language->name}}</td>
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
                                            <td>{{$book->publisher->name}}</td>
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
                                <div id="customer-review" class="tab-pane">
                                    <div class="clear" id="comment-list">
                                        <p class="text-success text-center">{{session('message')}}</p>
                                        <div class="post-comments comments-area style-1 clearfix">
                                            @foreach($book->comment as $comment)
                                                @php($comment_total = $loop->iteration)
                                            @endforeach
                                            <h4 class="comments-title">{{isset($comment_total) ? $comment_total : '0'}} COMMENTS</h4>
                                            <div id="comment">
                                                <ol class="comment-list">

                                                    @foreach($book->comment as $comment)
                                                    <li class="comment even thread-even depth-1 comment" id="comment-2">
                                                        <div class="comment-body">
                                                            <div class="comment-author vcard">
                                                                <img src="{{asset($comment->customer->image)}}" alt="" class="avatar"/>
                                                                <cite class="fn">{{$comment->customer->name}}</cite> <span class="says">says:</span>
                                                                <div class="comment-meta">
                                                                    <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content dlab-page-text">
                                                                <p>{{$comment->comment}}</p>
                                                            </div>
                                                            <div class="reply">
                                                                <a rel="nofollow" class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                        @php($comment_total = $loop->iteration)
                                                    @endforeach
                                                </ol>
                                            </div>
                                                @if(isset(Auth::guard('customer')->user()->id))
                                                    <div class="default-form comment-respond style-1" id="respond">
                                                <h4 class="comment-reply-title" id="reply-title">LEAVE A COMMENT <small> <a rel="nofollow" id="cancel-comment-reply-link" href="javascript:void(0)" style="display:none;">Cancel reply</a> </small></h4>
                                                <div class="clearfix">
                                                    <form action="{{route('comment.store')}}" method="POST" id="comments_form" class="comment-form" novalidate>
                                                        @csrf
                                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                                        <p class="comment-form-comment"><textarea  id="comments" placeholder="Type Comment Here" class="form-control4" name="comment" cols="45" rows="3" required="required"></textarea></p>
                                                        <p class="col-md-12 col-sm-12 col-xs-12 form-submit">
                                                            <button id="submit" type="submit" class="submit btn btn-primary filled">
                                                                Submit Now <i class="fa fa-angle-right m-l10"></i>
                                                            </button>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                                @else
                                            {{' '}}
                                                @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mt-5 mt-xl-0">
                        <div class="widget">
                            <h4 class="widget-title">Related Books</h4>
                            <div class="row">
                                @foreach($category_books as $key => $related_book)
                                    @if($related_book->status == 1)
                                        @if($key <=2)
                                <div class="col-xl-12 col-lg-6">
                                    <div class="dz-shop-card style-5">
                                        <div class="dz-media">
                                            <a href="{{route('product-detail', ['id' => $related_book->id])}}"><img src="{{asset($related_book->image)}}" alt=""></a>
                                        </div>
                                        <div class="dz-content">
                                            <h5 class="subtitle"><a href="{{route('product-detail', ['id' => $related_book->id])}}">{{$related_book->name}}</a></h5>
                                            <ul class="dz-tags">
                                                @foreach(json_decode($related_book->tags) as $key => $tag)
                                                    @if($key < 3)
                                                        <li>{{$tag}}{{ $key < 2 ? ',' : '' }}</li>
                                                    @else
                                                        <?php break; ?>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <div class="price">
                                                <span class="price-num">BDT {{$related_book->selling_price}}</span>
                                                <del>{{$related_book->regular_price}}</del>
                                            </div>
                                            <a href="{{route('cart.direct-add', ['id' => $related_book->id])}}" class="btn btn-outline-primary btn-sm btnhover btnhover2"><i class="flaticon-shopping-cart-1 me-2"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                        @else
                                            <?php break; ?>
                                        @endif
                                    @endif
                                @endforeach
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
