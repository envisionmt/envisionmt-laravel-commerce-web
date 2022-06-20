@extends('frontend.layouts.app')

@section('content')
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
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
                                            <p><a href="{{ route('frontend.products.show', $item->id) }}">{{ $item->options->name }}</a></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{ $item->options->price }}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input
                                            type="text"
                                            name="qty"
                                            id="sst"
                                            maxlength="12"
                                            value="{{ $item->qty }}"
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
                                </td>
                                <td>
                                    <h5>${{ $item->qty * $item->price }}</h5>
                                </td>
                            </tr>
                        @endforeach
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
                                            <a href="#">Flat Rate: $5.00</a>
                                        </li>
                                        <li>
                                            <a href="#">Free Shipping</a>
                                        </li>
                                        <li>
                                            <a href="#">Flat Rate: $10.00</a>
                                        </li>
                                        <li class="active">
                                            <a href="#">Local Delivery: $2.00</a>
                                        </li>
                                    </ul>
                                    <h6>
                                        Calculate Shipping
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input type="text" placeholder="Postcode/Zipcode"/>
                                    <a class="gray_btn" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="{{ route('frontend.products.index') }}">Continue Shopping</a>
                                    <a class="main_btn" href="{{ route('frontend.products.checkout') }}">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

@endsection
