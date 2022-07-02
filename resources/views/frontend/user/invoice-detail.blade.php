@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>{{ __('message.invoice_detail') }}</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">{{ __('message.home') }}</a>
                        <a href="{{ route('frontend.user.invoice') }}">{{ __('message.invoice') }}</a>
                        <a href="{{ route('frontend.user.invoiceDetail', $orderPayment->id) }}">#{{ $orderPayment->order_no }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container">
            <div class="row">
                <h3>Invoice #{{ $orderPayment->order_no }} - {{ $orderPayment->status_name }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>{{ $orderPayment->first_name . ' ' . $orderPayment->last_name }}</h6>
                    <h6>{{ __('message.address') }}: {{ $orderPayment->address1 }}, {{ $orderPayment->city }}, {{ $orderPayment->post_code }}</h6>
                    <h6>
                        {{ __('message.phone') }}: {{ $orderPayment->phone }}
                    </h6>
                </div>
                <div class="col-md-3">
                    <h6>
                        {{ __('message.shipping_free') }} </h6>
                    <h6>{{ __('message.free') }}</h6>
                </div>
                <div class="col-md-3">
                    <h6>
                        {{ __('message.payment_method') }}
                    </h6>
                    <h6>{{ __('message.alipay') }}</h6>
                </div>
            </div>
            <div class="cart_inner">
                <div class="card-body table-responsive p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('message.product') }}</th>
                            <th scope="col">{{ __('message.price') }}</th>
                            <th scope="col">{{ __('message.quantity') }}</th>
                            <th scope="col">{{ __('message.total') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderPayment->products as $item)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img
                                                src="{{ $item->image }}"
                                                alt=""
                                            />
                                        </div>
                                        <div class="media-body">
                                            <p>
                                                <a href="{{ route('frontend.products.show', $item->id) }}">{{ $item->name }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $item->pivot->price }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</h5>
                                </td>
                                <td>
                                    <h5>{{ $item->pivot->quantity }}</h5>
                                </td>
                                <td>
                                    <h5>{{ $item->pivot->total }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</h5>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
