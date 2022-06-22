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
                        <h2>Product Checkout</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="checkout.html">Product Checkout</a>
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
                        <h3>Billing Details</h3>
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
                                @include('frontend.fields.post_code')
                            </div>
                            <div class="col-md-12">
                                @include('frontend.fields.order-request')
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#"
                                    >Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach($list as $item)
                                    <li>
                                        <a href="#"
                                        >{{ $item->options->name }}
                                            <span class="middle">x {{ $item->qty }}</span>
                                            <span class="last">${{ $item->qty * $item->price }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#"
                                    >Subtotal
                                        <span>${{ Cart::subtotal() }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >Shipping
                                        <span>Flat rate: $50.00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    >Total
                                        <span>${{ Cart::total() }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <label for="f-option6">Alipay </label>
                                    <img src="{{asset('frontend/img/alipay.png')}}" alt="alipay"/>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store Town,
                                    Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="term-condition-check" name="term_condition_check"/>
                                <label for="term-condition-check">I’ve read and accept the </label>
                                <a href="{{ route('frontend.sites.page', 'terms-conditions') }}">terms & conditions*</a>
                                <span class="error invalid-feedback" id="term-condition-message">Please accept with term & condition before you can order on this website.</span>
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
