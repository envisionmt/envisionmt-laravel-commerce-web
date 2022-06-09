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
                    <form id="contact-form" class="form-inline" action="{{ route('frontend.sites.post-track-now') }}" method="POST">
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
        </div>
    </div>

@endsection
