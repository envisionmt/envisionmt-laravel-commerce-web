@push('after-scripts')
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
@endpush
@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>{{ __('message.product_checkout') }}</h2>
                        <p>{{ __('message.very_us_move_be_blessed_multiply_night') }}</p>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">{{ __('message.home') }}</a>
                        <a href="{{ route('frontend.products.checkout') }}">{{ __('message.product_checkout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    @include('backend.components.alert')
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <h3>{{ __('message.billing_details') }}</h3>
                        <form id="checkout-form" action="{{ route('frontend.products.postCheckout') }}"
                              method="POST"
                              class="row contact_form"
                        >
                            @csrf
                            <div class="col-md-6">
                                @include('frontend.fields.first-name')
                            </div>

                            <div class="col-md-6">
                                @include('frontend.fields.last-name')
                            </div>
                            <div class="col-md-12">
                                @include('frontend.fields.company-name')
                            </div>
                            <div class="col-md-6">
                                @include('frontend.fields.phone')
                            </div>
                            <div class="col-md-6">
                                @include('frontend.fields.email-address')
                            </div>
                            <div class="col-md-12">
                                @include('frontend.fields.address1')
                            </div>
                            <div class="col-md-12">
                                @include('frontend.fields.address2')
                            </div>
                            <div class="col-md-12">
                                @include('frontend.fields.city')
                            </div>
                            <div class="col-md-12">
                                @include('frontend.fields.post-code')
                            </div>
                            <div class="col-md-12">
                                @include('frontend.fields.order-request')
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>{{ __('message.your_order') }}</h2>
                            <ul class="list">
                                <li>
                                    <a href="#"
                                    >{{ __('message.product') }}
                                        <span>{{ __('message.total') }}</span>
                                    </a>
                                </li>
                                @foreach($list as $item)
                                    <li>
                                        <a href="#"
                                        >{{ $item->options->name }}
                                            <span class="middle">x {{ $item->qty }}</span>
                                            <span class="last">{{ $item->qty * $item->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#"
                                    >{{ __('message.subtotal') }}
                                        <span>{{ Cart::subtotal() }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >{{ __('message.discount') }}
                                        <span>0.00 %</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >{{ __('message.shipping') }}
                                        <span>Flat rate: $50.00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >{{ __('message.total') }}
                                        <span>{{ Cart::total() }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <label for="f-option6">Alipay </label>
                                    <img src="{{asset('frontend/img/alipay.png')}}" alt="alipay"/>
                                </div>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="term-condition-check" name="term_condition_check"/>
                                <label for="term-condition-check">{{ __('message.ive_read_and_accept_the') }} </label>
                                <a href="{{ route('frontend.sites.page', 'terms-conditions') }}">{{ __('message.terms_and_conditions') }}</a>
                                <span class="error invalid-feedback" id="term-condition-message">{{ __('message.please_accept_with_term_and_condition_before_you_can_order_on_this_website') }}</span>
                            </div>
                            <button class="main_btn" id="checkout-btn">Proceed to Alipay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection
