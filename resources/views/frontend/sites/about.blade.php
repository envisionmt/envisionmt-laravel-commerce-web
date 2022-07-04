@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>About</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">{{ __('message.home') }}</a>
                        <a href="{{ route('frontend.sites.about') }}">{{ __('message.about') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="mt-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-50">
                            <img class="img-fluid" src="http://w8.local/img/bg-img/4.9.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-4">
                    <!-- Single Benefits Area -->
                    <div class="col-12 col-sm-4 col-lg text-center">
                        <div class="mb-50">
                            <img src="http://w8.local/uploads/-OtAD2acf7pK3zM_pcqsjP1ip3hxcyD5.jpg" alt="">
                            <h5>NON-TOXIC</h5>
                        </div>
                    </div>
                    <!-- Single Benefits Area -->
                    <div class="col-12 col-sm-4 col-lg text-center">
                        <div class="mb-50">
                            <img src="http://w8.local/uploads/n0KBraCWuBw_0H2d1BklNfw4gModfrgz.jpg" alt="">
                            <h5>NATURAL</h5>
                        </div>
                    </div>
                    <!-- Single Benefits Area -->
                    <div class="col-12 col-sm-4 col-lg text-center">
                        <div class="mb-50">
                            <img src="http://w8.local/uploads/6m6bGKk9ZAw58keSFDq8VrOfgaCTukwt.jpg" alt="">
                            <h5>PURITY</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-us-area">
            <div class="container">
                <div class="row align-items-center">

                    <!-- About Us Content -->
                    <div class="col-12 col-md-8 mb-3">
                        <div class="about-us-content">
                            <!-- Section Heading -->
                            <div class="section-heading">
                                <h2><span>ABOUT</span> US</h2>
                            </div>
                            <p>
                                We are a professional company that produces a series of agarwood-related products, located in a 121 hectare (330 acre) plantation in southern Malaysia. There are about 200,000 agarwood trees in the plantation. There are many products, complete varieties, high quality, and no chemical additives. We also self-manufactured and processed for wholesale &amp; retailing. The current products mainly include: agarwood oil, agarwood bracelets, we created our own brand, no fakes, reasonable price, small profit, preferential treatment and people.                    </p>
                        </div>
                    </div>

                    <!-- Famie Video Play -->
                    <div class="col-12 col-md-4 mb-3">
                        <div>
                            <img src="http://w8.local/uploads/BIoQJuga81uHobvf4PIiVlV8uMw1Ragf.jpg" class="rounded-circle img-fluid" alt="">
                            <!-- Play Icon -->
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <img class="img-fluid" src="http://w8.local/img/core-img/about.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!--================End Home Banner Area =================-->
@endsection
