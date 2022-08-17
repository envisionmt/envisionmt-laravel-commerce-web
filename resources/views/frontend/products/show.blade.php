@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>{{ __('message.shop_detail') }}</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">{{ __('message.home') }}</a>
                        <a href="{{ route('frontend.products.index') }}">{{ __('message.shop') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container mb-5">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div
                            id="carouselExampleIndicators"
                            class="carousel slide"
                            data-ride="carousel"
                        >
                            <?php
                            $galleries = [];
                            if ($item->galleries && !empty(json_decode($item->galleries))) {
                                $galleries = json_decode($item->galleries);
                            }
                            array_unshift($galleries, $item->image);
                            ?>
                            <ol class="carousel-indicators">
                                @foreach($galleries as $key => $image)
                                    <li
                                        data-target="#carouselExampleIndicators"
                                        data-slide-to="{{ $key }}"
                                        class="{{ $key === 0 ? 'active' : '' }}"
                                    >
                                        <img
                                            src="{{ $image }}"
                                            alt=""
                                        />
                                    </li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($galleries as $key => $image)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <img
                                            class="d-block w-100"
                                            src="{{ $image }}"
                                            alt=""
                                        />
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $item->name }}</h3>
                        <h2>{{ $item->price }} {{ \App\Models\OrderPayment::USA_CURRENCY }}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>{{ __('message.category') }}</span> : {{ $item->category->name }}</a
                                >
                            </li>
                            <li>
                                <a href="#"> <span>{{ __('message.availability') }}</span>
                                    : {{ $item->stock_status_name }}</a>
                            </li>
                        </ul>
                        {!! $item->content !!}
                        <form action="{{ route('frontend.products.addCart') }}" method="POST">
                            @csrf
                            <div class="product_count">
                                <label for="qty">{{ __('message.quantity') }}:</label>
                                <input name="product_id" type="hidden" value="{{ $item->id }}">
                                <input
                                    type="text"
                                    name="qty"
                                    id="sst"
                                    maxlength="12"
                                    value="1"
                                    title="Quantity:"
                                    class="input-text qty"
                                />
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count"
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count"
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-down"></i>
                                </button>
                            </div>
                            <div class="card_area">
                                <button type="submit" class="main_btn">{{ __('message.add_to_cart') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

@endsection
