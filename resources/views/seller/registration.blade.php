@extends('website.master')

@section('body')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url(images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Registration</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
                            <li class="breadcrumb-item">Registration For Seller</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- inner page banner End-->

        <!-- contact area -->
        <section class="content-inner shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="login-area">
                            <form action="{{ route('seller.store.seller.data') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <h4 class="text-secondary">Registration</h4>
                                <p class="font-weight-600">If you don't have an account with us, please Registration.</p>
                                <div class="mb-4">
                                    <label class="label-title">Name <span class="text-danger">*</span></label>
                                    <input name="name" required class="form-control" placeholder="Your Name"
                                        type="text">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="label-title">Email address <span class="text-danger">*</span></label>
                                    <input name="email" required class="form-control" placeholder="Your Email address"
                                        type="email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="label-title">Mobile number (Bkash)<span
                                            class="text-danger">*</span></label>
                                    <input name="mobile" required class="form-control" placeholder="Your Mobile number"
                                        type="number">
                                    @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="label-title">Full Address <span class="text-danger">*</span></label>
                                    <textarea name="address" required class="form-control" placeholder="Your Full Address" type="text" cols="30"
                                        rows="4"></textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="label-title">Your Image <span class="text-danger">*</span></label>
                                    <input name="image" class="form-control" type="file">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="label-title">Password <span class="text-danger">*</span></label>
                                    <input name="password" required class="form-control " placeholder="Type Password"
                                        type="password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <small>Your personal data will be used to support your experience throughout this
                                        website, to manage access to your account, and for other purposes described in our
                                        <a href="privacy-policy.html">privacy policy</a>.</small>
                                </div>
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary btnhover w-100 me-2">Register</button>
                                    <a href="{{ route('seller.login.page') }}">Already have an Account? Login in now!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </section>
        <!-- contact area End-->
    </div>
@endsection
