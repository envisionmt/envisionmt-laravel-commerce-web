@push('after-scripts')
    <script src="{{ asset('frontend/js/add-cart.js') }}"></script>
@endpush
@php
    $route = request()->route();
@endphp
@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>{{ __('message.shop_category') }}</h2>
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

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">

                    <div class="latest_product_inner">
                        <div class="row">
                            @forelse ($list as $item)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <img
                                                class="card-img"
                                                src="{{ $item->image }}"
                                                alt="{{ $item->name }}"
                                            />
                                            <div class="p_icon">
                                                <a href="{{ route('frontend.products.show', $item->id) }}">
                                                    <i class="ti-eye"></i>
                                                </a>

                                                <a class="add-cart" href="#">
                                                    <form action="{{ route('frontend.products.addCart') }}"
                                                          method="POST">
                                                        @csrf
                                                        <input name="product_id" type="hidden" value="{{ $item->id }}">
                                                        <input name="qty" type="hidden" value="1">
                                                        <i class="ti-shopping-cart"></i>
                                                    </form>
                                                </a>


                                            </div>
                                        </div>
                                        <div class="product-btm">
                                            <a href="{{ route('frontend.products.show', $item->id) }}" class="d-block">
                                                <h4>{{ $item->name }}</h4>
                                            </a>
                                            <div class="mt-3">
                                                <span class="mr-4">{{ $item->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No data for this time period.</p>
                            @endforelse
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="px-3">{{ $list->total() }} result(s)</p>
                            </div>
                            <div class="col-sm-6">
                                <div class="px-3 float-right">
                                    {{ $list->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>{{ __('message.browse_categories') }}</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($categories as $category)
                                        <li class="{{ $route->named('frontend.products.index') && request()->input('category_id') === $category->id ? 'active' : '' }}">
                                            <a href="{{ route('frontend.products.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
@endsection
