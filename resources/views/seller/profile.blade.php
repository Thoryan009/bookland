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
                            <p class="text-success text-center">{{session('message')}}</p>
                            <h1>Balance : {{$totalBalance}}</h1>
                            <button class="btn btn-success">Withdraw Request</button>
                            <div class="shop-bx shop-profile">
                                <div class="shop-bx-title clearfix">
                                    <h5 class="text-uppercase">Basic Information</h5>
                                </div>
                                <form action="{{route('seller.information.update', ['id' => Auth::guard('seller')->user()->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row m-b30">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput1" class="form-label">Your Name:</label>
                                                <input type="text" name="name" value="{{$seller->name}}" class="form-control" id="formcontrolinput1" placeholder="Name" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput2" class="form-label">Your Email:</label>
                                                <input type="email" name="email" value="{{$seller->email}}" class="form-control" id="formcontrolinput2" placeholder="Email Address" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput3" class="form-label">Date Of Birth:</label>
                                                <input type="date" name="date_of_birth" value="{{$seller->date_of_birth}}" class="form-control" id="formcontrolinput3" placeholder="Date Of Birth">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput4" class="form-label">Blood Group:</label>
                                                <select class="form-control" id="formcontrolinput4" name="blood_group" id="">
                                                    <option value="">--Select Blood Group--</option>
                                                    <option value="A-" @selected($seller->blood_group=="A-") >A-</option>
                                                    <option value="A+" @selected($seller->blood_group=="A+")>A+</option>
                                                    <option value="B+" @selected($seller->blood_group=="B+")>B+</option>
                                                    <option value="B-" @selected($seller->blood_group=="B-")>B-</option>
                                                    <option value="AB-" @selected($seller->blood_group=="AB-")>AB-</option>
                                                    <option value="AB+" @selected($seller->blood_group=="AB+")>AB+</option>
                                                    <option value="O+" @selected($seller->blood_group=="O+")>O+</option>
                                                    <option value="O-" @selected($seller->blood_group=="O-")>O-</option>
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
                                                <input type="number" name="mobile" value="{{$seller->mobile}}" class="form-control" id="formcontrolinput5" placeholder="Contact Number">
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
                                                <img src="{{asset($seller->image)}}" width="50" height="50" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">

                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea" class="form-label">Address:</label>
                                                <textarea class="form-control" name="address" id="exampleFormControlTextarea" rows="5">{{$seller->address}}</textarea>
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
