@extends('frontend.layouts.app')

@section('content')
    <div class="site-section-cover overlay inner-page bg-light"
         style="background-image: url('/frontend/images/depot_delivery_1.jpg')" data-aos="fade">

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-10">

                    <div class="box-shadow-content">
                        <div class="block-heading-1">
                            <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">{{ $item->title }}</h1>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                {!! $item->body !!}
            </div>
        </div>
    </div>

@endsection
