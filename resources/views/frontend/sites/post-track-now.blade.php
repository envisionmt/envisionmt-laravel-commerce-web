@extends('frontend.layouts.app')

@section('content')
    <div class="site-section-cover overlay inner-page bg-light"
         style="background-image: url('/frontend/images/depot_delivery_1.jpg')" data-aos="fade">

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-10">

                    <div class="box-shadow-content">
                        <div class="block-heading-1">
                            <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">Track My Order</h1>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <p>Please enter your tracking number.</p>
                <div class="col-md-12">
                    <form id="contact-form" class="form-inline" action="{{ route('frontend.sites.post-track-now') }}"
                          method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            @include('frontend.fields.track_order_code')
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary text-white px-3">Track Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="text-primary">Status</h2>
                    <h6>Date of order generate: {{ date('d-m-Y H:i:s', strtotime($item->step1)) }}</h6>
                    <h6>Tracking number: {{ $item->track_order_code }}</h6>
                    <br>
                </div>
            </div>
            <ul id="progressbar" class="row mt-2 mb-5">
                <li class="{{ $item->step1 ? 'active' : '' }}">
                    <strong>Warehouse</strong><br>{{ $item->step1 ? date('d-m-Y H:i:s', strtotime($item->step1)) : '' }}
                </li>
                <li class="{{ $item->step2 ? 'active' : '' }}">
                    <strong>In Transit</strong><br>{{ $item->step2 ? date('d-m-Y H:i:s', strtotime($item->step2)) : '' }}
                </li>
                <li class="{{ $item->step3 ? 'active' : '' }}">
                    <strong>Pick up point</strong><br>{{ $item->step3 ? date('d-m-Y H:i:s', strtotime($item->step3)) : '' }}
                </li>
                <li class="{{ $item->step4 ? 'active' : '' }}">
                    <strong>Delivered</strong><br>{{ $item->step4 ? date('d-m-Y H:i:s', strtotime($item->step4)) : '' }}
                </li>
            </ul>
        </div>
    </div>

@endsection
