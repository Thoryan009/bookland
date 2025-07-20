@extends('website.master')

@section('title')
    Privacy Policy
@endsection

@section('body')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url(images/background/bg3.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Privacy Policy</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
                            <li class="breadcrumb-item">Privacy Policy</li>
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
                        <h4 class="title">🔒 Privacy Policy</h4>
                        <p class="m-b30">
                            At <strong>Bookland</strong>, your privacy is important to us. This policy explains how we
                            collect, use, and protect your information when you use our website.
                        </p>

                        <div class="dlab-divider bg-gray-dark"></div>

                        <h4 class="title">📌 What We Collect</h4>
                        <p class="m-b30">
                            When you register, buy, or sell books, we may collect:
                        </p>
                        <ul class="list-check primary m-a0">
                            <li>Your name, email, phone number</li>
                            <li>Shipping and billing address</li>
                            <li>Payment information (securely processed)</li>
                            <li>Book listing details (if you are a seller)</li>
                            <li>User activity (e.g., pages visited, orders made)</li>
                        </ul>

                        <div class="dlab-divider bg-gray-dark"></div>

                        <h4 class="title">🔐 How We Use Your Information</h4>
                        <p class="m-b30">
                            We use your data to:
                        </p>
                        <ul class="list-check primary m-a0">
                            <li>Process orders and payments</li>
                            <li>Enable users to buy and sell books</li>
                            <li>Improve our website and services</li>
                            <li>Communicate with you (order updates, offers, support)</li>
                            <li>Prevent fraud and ensure secure transactions</li>
                        </ul>

                        <div class="dlab-divider bg-gray-dark"></div>

                        <h4 class="title">🛡 How We Protect Your Information</h4>
                        <p class="m-b30">
                            We use industry-standard security measures:
                        </p>
                        <ul class="list-check primary m-a0">
                            <li>Encrypted passwords and secure sessions</li>
                            <li>HTTPS for secure browsing</li>
                            <li>Regular system updates and audits</li>
                            <li>We do not sell or share your personal data with third parties for marketing</li>
                        </ul>

                        <div class="dlab-divider bg-gray-dark"></div>

                        <h4 class="title">💬 Messaging & Notifications</h4>
                        <ul class="list-check primary m-a0">
                            <li>Order updates</li>
                            <li>Promotions (optional — you can unsubscribe)</li>
                            <li>System messages from admins or buyers/sellers</li>
                        </ul>

                        <div class="dlab-divider bg-gray-dark"></div>

                        <h4 class="title">👤 Your Rights</h4>
                        <ul class="list-check primary m-a0">
                            <li>You can update your profile information anytime</li>
                            <li>You can request account deletion by contacting support</li>
                            <li>You can opt out of promotional messages</li>
                        </ul>

                        <div class="dlab-divider bg-gray-dark"></div>

                        <h4 class="title">📁 Data Retention</h4>
                        <p class="m-b30">
                            We keep your data only as long as needed for order history, legal requirements, or user support.
                        </p>
                        <p class="m-b30">
                            By using Bookland, you agree to this policy. We may update this page from time to time. Major
                            changes will be notified via email or on-site alerts.
                        </p>
                        <p class="m-b30">
                            📬 For questions, contact: <a href="mailto:privacy@bookland.com">privacy@bookland.com</a>
                        </p>
                    </div>

                    <!-- Right sidebar -->
                    <div class="col-lg-4 col-md-5 col-sm-12 m-b30 mt-md-0 mt-4">
                        <aside class="side-bar sticky-top right">
                            <div class="service_menu_nav widget style-1">
                                <ul class="menu">
                                    <li class="menu-item"><a href="{{ route('return-refund') }}"><span>Returns &
                                                Refunds</span></a></li>
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
