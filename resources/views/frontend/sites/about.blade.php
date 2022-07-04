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
                            <img class="img-fluid" src="{{ $aboutTopIntroduction->image }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <!-- Single Benefits Area -->
                    @foreach($serviceIntroductions as $serviceIntroduction)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-feature">
                                <a href="#" class="title">
                                    <i class="{{ $serviceIntroduction->sub_title }}"></i>
                                    <h3>{{ $serviceIntroduction->title }}</h3>
                                </a>
                                <p>{{ $serviceIntroduction->description }}</p>
                            </div>
                        </div>
                    @endforeach

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
                                <h2>{{ $aboutUsIntroduction->title }}</h2>
                            </div>
                            <p>
                                {{ $aboutUsIntroduction->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Famie Video Play -->
                    <div class="col-12 col-md-4 mb-3">
                        <div>
                            <img src="{{ $aboutUsIntroduction->image }}" class="rounded-circle img-fluid" alt="{{ $aboutUsIntroduction->title }}">
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <img class="img-fluid" src="{{ $aboutBottomIntroduction->image }}" alt="">
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!--================End Home Banner Area =================-->
@endsection
