@push('after-scripts')
    <script src="{{ asset('frontend/js/add-cart.js') }}"></script>
@endpush
@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <p class="sub text-uppercase">{{ $introduction->title }}</p>
                        <h3>{!! $introduction->sub_title  !!}</h3>
                        <h4>{{ $introduction->description }}</h4>
                        <a class="main_btn mt-40" href="{{ $introduction->link }}">View Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <section class="container">
        @include('backend.components.alert')
    </section>
    <!-- Start feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
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
    <!-- End feature Area -->

    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>{{ $featureIntroduction->title }}</span></h2>
                        <p>{{ $featureIntroduction->sub_title }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($featuredProducts as $featuredProduct)

                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="{{ $featuredProduct->image }}" alt=""/>
                                <div class="p_icon">
                                    <a href="{{ route('frontend.products.show', $featuredProduct->id) }}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a class="add-cart" href="#">
                                        <form action="{{ route('frontend.products.addCart') }}"
                                              method="POST">
                                            @csrf
                                            <input name="product_id" type="hidden" value="{{ $featuredProduct->id }}">
                                            <input name="qty" type="hidden" value="1">
                                            <i class="ti-shopping-cart"></i>
                                        </form>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="{{ route('frontend.products.show', $featuredProduct->id) }}" class="d-block">
                                    <h4>{{ $featuredProduct->name }}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{ $featuredProduct->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->

    <!--================ Offer Area =================-->
    <section class="offer_area" style="background-image: url({{ $saleOffIntroduction->image }})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="offset-lg-4 col-lg-6 text-center">
                    <div class="offer_content">
                        <h3 class="text-uppercase mb-40">{{ $saleOffIntroduction->title }}</h3>
                        <h2 class="text-uppercase">{{ $saleOffIntroduction->sub_title }}</h2>
                        <a href="{{ $saleOffIntroduction->link }}" class="main_btn mb-20 mt-5">Discover Now</a>
                        <p>{{ $saleOffIntroduction->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Offer Area =================-->

    <!--================ New Product Area =================-->
    <section class="new_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>{{ $newProductIntroduction->title }}</span></h2>
                        <p>{{ $newProductIntroduction->description }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="new_product">
                        <h5 class="text-uppercase">collection of 2022</h5>
                        <h3 class="text-uppercase">{{ $hotProduct->name }}</h3>
                        <div class="product-img">
                            <img class="img-fluid" src="{{ $hotProduct->image }}" alt="{{ $hotProduct->name }}"/>
                        </div>
                        <h4>{{ $hotProduct->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</h4>

                        <form action="{{ route('frontend.products.addCart') }}"
                              method="POST">
                            @csrf
                            <input name="product_id" type="hidden" value="{{ $hotProduct->id }}">
                            <input name="qty" type="hidden" value="1">
                            <button type="submit" class="main_btn">Add to cart</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        @foreach($newProducts as $newProduct)
                            <div class="col-lg-6 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img class="img-fluid w-100" src="{{ $newProduct->image }}" alt=""/>
                                        <div class="p_icon">
                                            <a href="{{ route('frontend.products.show', $newProduct->id) }}">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a class="add-cart" href="#">
                                                <form action="{{ route('frontend.products.addCart') }}"
                                                      method="POST">
                                                    @csrf
                                                    <input name="product_id" type="hidden" value="{{ $newProduct->id }}">
                                                    <input name="qty" type="hidden" value="1">
                                                    <i class="ti-shopping-cart"></i>
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="{{ route('frontend.products.show', $newProduct->id) }}" class="d-block">
                                            <h4>{{ $newProduct->name }}</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">{{ $newProduct->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End New Product Area =================-->

    <!--================ Inspired Product Area =================-->
    <section class="inspired_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>{{ $inspiredProductIntroduction->title }}</span></h2>
                        <p>{{ $inspiredProductIntroduction->description }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="{{ $product->image }}" alt="{{ $product->title }}"/>
                                <div class="p_icon">
                                    <a href="{{ route('frontend.products.show', $product->id) }}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a class="add-cart" href="#">
                                        <form action="{{ route('frontend.products.addCart') }}"
                                              method="POST">
                                            @csrf
                                            <input name="product_id" type="hidden" value="{{ $product->id }}">
                                            <input name="qty" type="hidden" value="1">
                                            <i class="ti-shopping-cart"></i>
                                        </form>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="{{ route('frontend.products.show', $product->id) }}" class="d-block">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{ $product->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Inspired Product Area =================-->

@endsection
