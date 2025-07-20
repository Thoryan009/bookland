@extends('website.master')

@section('title')
    Returns & Refunds
@endsection

@section('body')

    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{asset('/')}}website/images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Returns & Refunds</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home</a></li>
                            <li class="breadcrumb-item">Returns & Refunds</li>
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
                <h4 class="title">🔁 Returns & Refunds Policy</h4>
                <p class="m-b30">
                    At <strong>Bookland</strong>, we aim to ensure your book-buying experience is smooth and satisfying — even when you're buying or selling pre-owned books.
                </p>

                <div class="dlab-divider bg-gray-dark"></div>

                <h4 class="title">✅ Return Eligibility</h4>
                <p class="m-b15"><strong>New Books:</strong> Can be returned within 7 days of delivery if:</p>
                <ul class="list-check primary m-a0 m-b30">
                    <li>The book is damaged on arrival</li>
                    <li>The wrong book was delivered</li>
                    <li>Pages are missing or unreadable</li>
                </ul>

                <p class="m-b15"><strong>Pre-Owned Books:</strong> Since these are sold by individual users or sellers, returns are accepted only if:</p>
                <ul class="list-check primary m-a0 m-b30">
                    <li>The item is significantly different from the description</li>
                    <li>It arrives damaged or in poor condition beyond expected wear</li>
                </ul>

                <p class="m-b30">📸 Please include photos when requesting a return for faster processing.</p>

                <div class="dlab-divider bg-gray-dark"></div>

                <h4 class="title">💸 Refunds</h4>
                <ul class="list-check primary m-a0 m-b30">
                    <li>Approved refunds will be processed within 5–7 business days.</li>
                    <li>Refunds are issued via the original payment method (Bkash, Nagad, card, etc.).</li>
                    <li>For Cash on Delivery orders, we will request your preferred refund method.</li>
                </ul>

                <div class="dlab-divider bg-gray-dark"></div>

                <h4 class="title">⚠ Items Not Eligible for Return</h4>
                <ul class="list-check primary m-a0 m-b30">
                    <li>Books returned after the return window (7 days)</li>
                    <li>Items damaged by the user after delivery</li>
                    <li>Pre-owned books that match the described condition</li>
                </ul>

                <div class="dlab-divider bg-gray-dark"></div>

                <h4 class="title">🧾 How to Request a Return</h4>
                <ul class="list-check primary m-a0 m-b30">
                    <li>Go to your Order History</li>
                    <li>Click "Request Return"</li>
                    <li>Fill in the reason and upload images (if needed)</li>
                    <li>Our support team will review and respond within 48 hours</li>
                </ul>

                <p class="m-b30">
                    <strong>Note for Sellers:</strong><br>
                    If you're listing books, please describe them honestly. Repeated complaints may lead to account review or restrictions.
                </p>

                <p class="m-b30">
                    We want <strong>Bookland</strong> to be a safe and trusted platform for everyone — thank you for helping us keep it that way!
                </p>
            </div>

            <!-- Right sidebar -->
            <div class="col-lg-4 col-md-5 col-sm-12 m-b30 mt-md-0 mt-4">
                <aside class="side-bar sticky-top right">
                    <div class="service_menu_nav widget style-1">
                        <ul class="menu">
                            <li class="menu-item"><a href="{{ route('return-refund') }}"><span>Returns & Refunds</span></a></li>
                            <li class="menu-item"><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                            <li class="menu-item"><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

        <!-- Privacy Policy END -->
    </div>

@endsection
