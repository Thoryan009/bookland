@extends('website.master')

@section('title')
    About Us
@endsection

@section('body')

    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url(images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>About Us</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item">About Us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- inner page banner End-->

        <!-- contact area -->
     <section class="content-inner-1 shop-account">
    <div class="container">
        <div class="row">
            <!-- Left part start -->
            <div class="col-lg-8 col-md-7 col-sm-12 inner-text">
                <h4 class="title">About Us</h4>
                <p class="m-b30">
                    Welcome to <strong>Bookland</strong> – Your Smart Book Marketplace.
                </p>
                <p class="m-b30">
                    At Bookland, we believe in making books more accessible, affordable, and sustainable.
                    We're more than just an online bookstore — we're a community-driven platform where readers, writers, and sellers come together to exchange knowledge and passion for literature.
                </p>
                <p class="m-b30">
                    Whether you're a student searching for affordable textbooks, a book lover hunting for rare finds,
                    or an independent author looking to reach your audience — Bookland is your one-stop solution.
                </p>

                <div class="dlab-divider bg-gray-dark"></div>

                <h4 class="title">What We Offer</h4>
                <ul class="list-check primary m-a0">
                    <li>📚 A wide selection of books — from academic to fiction, new and pre-owned</li>
                    <li>♻ A platform to sell your used books — turning your shelf space into value</li>
                    <li>✍ Support for new writers — enabling independent authors to publish and earn</li>
                    <li>🔐 Secure shopping experience — with safe payments and real-time order tracking</li>
                </ul>

                <div class="dlab-divider bg-gray-dark"></div>

                <h4 class="title">Our Mission</h4>
                <p class="m-b30">
                    Our mission is to bridge the gap between book owners and seekers, reduce book waste,
                    and empower readers and sellers with a modern, user-friendly digital marketplace.
                </p>

                <p class="m-b30">
                    Join <strong>Bookland</strong> — where every book finds its next reader.
                </p>
            </div>

          
        </div>
    </div>
</section>

    </div>

@endsection
