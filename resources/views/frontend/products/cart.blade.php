@push('after-scripts')
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
@endpush
@extends('frontend.layouts.app')

@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('frontend.products.updateCart') }}">
                        @csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img
                                                    src="{{ $item->options->image }}"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="media-body">
                                                <p>
                                                    <a href="{{ route('frontend.products.show', $item->id) }}">{{ $item->options->name }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $item->options->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input
                                                type="text"
                                                name="qty[{{ $item->id }}]"
                                                id="sst"
                                                maxlength="12"
                                                value="{{ $item->qty }}"
                                                title="Quantity:"
                                                class="input-text qty"
                                            />
                                            <button
                                                class="increase items-count"
                                                type="button"
                                            >
                                                <i class="lnr lnr-chevron-up"></i>
                                            </button>
                                            <button
                                                class="reduced items-count"
                                                type="button"
                                            >
                                                <i class="lnr lnr-chevron-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $item->qty * $item->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</h5>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <button class="gray_btn" type="submit">Update Cart</button>
                                    <button type="button" id="clear-cart-btn" class="gray_btn">Clear Cart</button>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li>
                                                <a href="#">Flat Rate: 5.00 MYR</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">Flat Rate: 10.00 MYR</a>
                                            </li>
                                        </ul>
                                        <h6>
                                            Calculate Shipping
                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </h6>
                                        <select id="shipping_destination_id" class="shipping_select">
                                            @foreach($shippingDestinations as $shippingDestination)
                                                <option value="{{ $shippingDestination->id }}">{{ $shippingDestination->name }}</option>
                                            @endforeach
                                        </select>
                                        <select id="delivery_method" class="shipping_select">
                                            @foreach($deliveryMethods as $deliveryMethod)
                                                <option value="{{ $deliveryMethod->id }}">{{ $deliveryMethod->name }}</option>
                                            @endforeach
                                        </select>
                                        <select id="payment_method" class="shipping_select">
                                            @foreach($paymentMethods as $paymentMethod)
                                                <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="gray_btn" >Update Details</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner">
                                        <a class="gray_btn" href="{{ route('frontend.products.index') }}">Continue
                                            Shopping</a>
                                        <a class="main_btn" href="{{ route('frontend.products.checkout') }}">Proceed to
                                            checkout</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <form id="clear-cart-form" method="POST" action="{{ route('frontend.products.clearCart') }}">
        @csrf
    </form>
    <!--================End Cart Area =================-->

@endsection
