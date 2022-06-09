@extends('frontend.layouts.app')

@section('content')
    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 overlay" style="background-image: url('{{ $transportationsLogistic->image }}')">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-lg-6">
                        <h1>{{ $transportationsLogistic->title }}</h1>
                        <p class="mb-5">{{ $transportationsLogistic->description }}</p>
                        <form action="{{ route('frontend.sites.post-track-now') }}" method="POST">
                            @csrf
                            <div class="form-group d-flex">
                                @include('frontend.fields.track_order_code')
                                <input type="submit" class="btn btn-primary text-white px-4" value="Track Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END .ftco-cover-1 -->
        <div class="site-section ftco-service-image-1 pb-5">
            <div class="container">
                <div class="owl-carousel owl-all">
                    @foreach($transportations as $transportation)
                        <div class="service text-center">
                            <a href="#"><img src="{{ $transportation->image  }}" alt="{{ $transportation->title }}" class="img-fluid"></a>
                            <div class="px-md-3">
                                <h3><a href="{{ $transportation->link }}">{{ $transportation->title }}</a></h3>
                                <p>{{ $transportation->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="site-section bg-light" id="services-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="block-heading-1">
                        <h2>Services</h2>
                        <p>We offers door-to-door services by sea or air. we offer advice on customs regulations prior to shipping and assistance with shipping and destination customs documentation. We offer fully comprehensive insurance cover for your baggage or luggage.</p>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-all">
                @foreach($services as $service)
                    <div class="block__35630 text-center">
                        <div class="icon mb-0">
                            <span class="{{ $service->sub_title }}"></span>

                        </div>
                        <h3 class="mb-3">{{ $service->title }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




    <div class="site-section" id="about-section">

        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2>{{ $aboutUs->title }}</h2>
                        <p>{{ $aboutUs->description }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="site-section bg-light" id="about-section">
        <div class="container">
            <div class="row justify-content-center mb-4 block-img-video-1-wrap">
                <div class="col-md-12 mb-5">
                    <figure class="block-img-video-1" data-aos="fade">
                        <img src="{{ $aboutUs->image }}" alt="{{ $aboutUs->title }}" class="img-fluid">
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach($growths as $growth)
                            <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-6" data-aos="fade-up" data-aos-delay="">
                                <div class="block-counter-1">
                                    <span class="number"><span data-number="{{ $growth->title }}">0</span>+</span>
                                    <span class="caption">{{ $growth->description }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section" id="faq-section">
        <div class="container">
            <div class="row mb-5">
                <div class="block-heading-1 col-12 text-center">
                    <h2>Frequently Ask Questions</h2>
                </div>
            </div>
            <div class="row">
                @foreach($questions as $question)
                    <div class="col-lg-6">
                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">{{ $question->title }}</h3>
                            <p>{{ $question->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="block__73694 site-section border-top" id="why-us-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">

                <div class="col-12 col-lg-6 block__73422 order-lg-2"
                     style="background-image: url('{{ $whyDepot->image }}');" data-aos="fade-left"
                     data-aos-delay="">
                </div>


                <div class="col-lg-5 mr-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade-right"
                     data-aos-delay="">
                    <h2 class="mb-4 text-black">{{ $whyDepot->title }}</h2>
                    {!! $whyDepot->description !!}

                </div>

            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                    <div class="block-heading-1">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5" data-aos="fade-up" data-aos-delay="100">
                    @include('frontend.includes.alert')
                    <form action="{{ route('frontend.sites.contact-us') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" placeholder="Email address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30"
                                          rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                                       value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
