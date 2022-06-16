@extends('backend.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Order Payment Information</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('backend.order-payments.index') }}" class="btn btn-default mr-2">Back</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    @include('backend.components.alert')
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order Payment</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>
                                                <strong>User:</strong>
                                                {{ $item->user->name }}
                                            </p>
                                            <p>
                                                <strong>Order No:</strong>
                                                {{ $item->order_no }}
                                            </p>
                                            <p>
                                                <strong>Channel:</strong>
                                                {{ $item->channel }}
                                            </p>
                                            <p>
                                                <strong>Email:</strong>
                                                {{ $item->email }}
                                            </p>
                                            <p>
                                                <strong>FPX Bank:</strong>
                                                {{ $item->fpx_bank }}
                                            </p>
                                            <p>
                                                <strong>Description:</strong>
                                                {{ $item->description }}
                                            </p>
                                            <p>
                                                <strong>Transaction Amount:</strong>
                                                {{ $item->transaction_amount }}
                                            </p>
                                            <p>
                                                <strong>Transaction Amount Origin:</strong>
                                                {{ $item->transaction_amount_origin }}
                                            </p>
                                            <p>
                                                <strong>Sub Total:</strong>
                                                {{ $item->subtotal }}
                                            </p>
                                            <p>
                                                <strong>Shipping Charge:</strong>
                                                {{ $item->shipping_charge }}
                                            </p>
                                            <p>
                                                <strong>Transaction Currency:</strong>
                                                {{ $item->transaction_currency }}
                                            </p>
                                            <p>
                                                <strong>Status Name:</strong>
                                                {{ $item->status_name }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>First Name:</strong>
                                                {{ $item->first_name }}
                                            </p>
                                            <p>
                                                <strong>Last Name:</strong>
                                                {{ $item->last_name }}
                                            </p>
                                            <p>
                                                <strong>Post Code:</strong>
                                                {{ $item->post_code }}
                                            </p><p>
                                                <strong>City:</strong>
                                                {{ $item->city }}
                                            </p><p>
                                                <strong>Address 1:</strong>
                                                {{ $item->address1 }}
                                            </p>
                                            <p>
                                                <strong>Address 2:</strong>
                                                {{ $item->address2 }}
                                            </p>
                                            <p>
                                                <strong>Shipping Status:</strong>
                                                {{ $item->shipping_status_name }}
                                            </p>
                                            <p>
                                                <strong>Shipping Destination:</strong>
                                                {{ $item->shippingDestination->name }}
                                            </p>
                                            <p>
                                                <strong>Delivery Method:</strong>
                                                {{ $item->deliveryMethod->name }}
                                            </p>
                                            <p>
                                                <strong>Payment Method:</strong>
                                                {{ $item->paymentMethod->name }}
                                            </p>
                                            <p>
                                                <strong>Created at:</strong>
                                                {{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}
                                            </p>
                                            <p>
                                                <strong>Updated at:</strong>
                                                {{ date('d-m-Y H:i:s', strtotime($item->updated_at)) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
