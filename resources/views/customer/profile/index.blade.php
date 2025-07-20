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
                        <div class="col-xl-3 col-lg-4 m-b30">
                            <div class="sticky-top">
                                <div class="shop-account">
                                    <div class="account-detail text-center">
                                        <div class="my-image">
                                            <a href="javascript:void(0);">
                                                <img alt="" src="{{asset($customer->image)}}">
                                            </a>
                                        </div>
                                        <div class="account-title">
                                            <div class="">
                                                <h4 class="m-b5"><a href="javascript:void(0);">{{$customer->name}}</a></h4>
                                                <p class="m-b0"><a href="javascript:void(0);">Customer</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="account-list">
                                        <li>
                                            <a href="my-profile.html" class="active"><i class="far fa-user" aria-hidden="true"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('cart.index')}}"><i class="flaticon-shopping-cart-1"></i>
                                                <span>My Cart</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('wishlist.index')}}"><i class="far fa-heart" aria-hidden="true"></i>
                                                <span>Wishlist</span></a>
                                        </li>

                                        <li>
                                            <a href="{{route('privacy-policy')}}"><i class="fa fa-key" aria-hidden="true"></i>
                                                <span>Privacy Policy</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('customer.customer-logout')}}"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                                <span>Log Out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 m-b30">
                            <p class="text-success text-center">{{session('message')}}</p>
                            <div class="shop-bx shop-profile">
                                <div class="shop-bx-title clearfix">
                                    <h5 class="text-uppercase">Basic Information</h5>
                                </div>
                                <form action="{{route('customer.customer-profile-update', ['id' => Auth::guard('customer')->user()->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row m-b30">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput1" class="form-label">Your Name:</label>
                                                <input type="text" name="name" value="{{$customer->name}}" class="form-control" id="formcontrolinput1" placeholder="Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput2" class="form-label">Your Email:</label>
                                                <input type="email" name="email" value="{{$customer->email}}" class="form-control" id="formcontrolinput2" placeholder="Email Address" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput3" class="form-label">Date Of Birth:</label>
                                                <input type="date" name="date_of_birth" value="{{$customer->date_of_birth}}" class="form-control" id="formcontrolinput3" placeholder="Date Of Birth">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput4" class="form-label">Blood Group:</label>
                                                <select class="form-control" id="formcontrolinput4" name="blood_group" id="">
                                                    <option value="">--Select Blood Group--</option>
                                                    <option value="A-" @selected($customer->blood_group=="A-") >A-</option>
                                                    <option value="A+" @selected($customer->blood_group=="A+")>A+</option>
                                                    <option value="B+" @selected($customer->blood_group=="B+")>B+</option>
                                                    <option value="B-" @selected($customer->blood_group=="B-")>B-</option>
                                                    <option value="AB-" @selected($customer->blood_group=="AB-")>AB-</option>
                                                    <option value="AB+" @selected($customer->blood_group=="AB+")>AB+</option>
                                                    <option value="O+" @selected($customer->blood_group=="O+")>O+</option>
                                                    <option value="O-" @selected($customer->blood_group=="O-")>O-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="formcontrolinput5" class="form-label">Password:</label>
                                                <input type="password" name="password" class="form-control" id="formcontrolinput5" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="formcontrolinput5" class="form-label">Contact Number:</label>
                                                <input type="number" name="mobile" value="{{$customer->mobile}}" class="form-control" id="formcontrolinput5" placeholder="Contact Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="formcontrolinput5" class="form-label">Image:</label>
                                                <input type="file" name="image" class="form-control" id="formcontrolinput5">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <img src="{{asset($customer->image)}}" width="50" height="50" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">

                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea" class="form-label">Address:</label>
                                                <textarea class="form-control" name="address" id="exampleFormControlTextarea" rows="5">{{$customer->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btnhover">Update Profile</button>
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
