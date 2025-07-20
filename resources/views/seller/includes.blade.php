  <div class="col-xl-3 col-lg-4 m-b30">
                            <div class="sticky-top">
                                <div class="shop-account">
                                    <div class="account-detail text-center">
                                        <div class="my-image ">
                                                    <img style="width: 150px; height: 150px" src="{{ asset($seller->image) }}">

                                            <a href="" class="">
                                                {{-- javascript:void(0) --}}
                                                <div class="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="account-title">
                                            <div class="">
                                                <h4 class="m-b5"><a href="javascript:void(0);">{{ $seller->name }}</a>
                                                </h4>
                                                <p class="m-b0"><a href="javascript:void(0);">Seller</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="account-list">
                                        <li>
                                            <a href="{{route('seller.profile')}}" class="active"><i class="far fa-user"
                                                    aria-hidden="true"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('seller.add.book') }}"><i class="flaticon-shopping-cart-1"></i>
                                                <span>Add Book For Sell</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('seller.my.book') }}"><i class="flaticon-shopping-cart-1"></i>
                                                <span>My Books</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('seller.customer.orders') }}"><i class="far fa-heart"
                                                    aria-hidden="true"></i>
                                                <span>Customer Order</span></a>
                                        </li>

                                      
                                        <li>
                                            <a href="{{ route('customer.customer-logout') }}"><i class="fas fa-sign-out-alt"
                                                    aria-hidden="true"></i>
                                                <span>Log Out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>