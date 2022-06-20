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
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form id="checkout-form" action="{{ route('frontend.products.postCheckout') }}"
                              method="POST"
                              class="row contact_form"
                        >
                            @csrf
                            <div class="col-md-6 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="first"
                                    name="first_name"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="First name"
                                ></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="last"
                                    name="last_name"
                                />
                                <span class="placeholder" data-placeholder="Last name"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="company"
                                    name="company"
                                    placeholder="Company name"
                                />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="number"
                                    name="phone_number"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Phone number"
                                ></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Email Address"
                                ></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="add1"
                                    name="address1"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Address line 01"
                                ></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="add2"
                                    name="address2"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Address line 02"
                                ></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="city"
                                    name="city"
                                />
                                <span class="placeholder" data-placeholder="Town/City"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="zip"
                                    name="post_code"
                                    placeholder="Postcode/ZIP"
                                />
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea
                                    class="form-control"
                                    name="description"
                                    id="message"
                                    rows="1"
                                    placeholder="Order Request"
                                ></textarea>
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
                                <input type="checkbox" id="f-option4" name="selector"/>
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
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
