@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>About</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">{{ __('message.home') }}</a>
                        <a href="{{ route('frontend.sites.about') }}">{{ __('message.about') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="about-us-area mt-4">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-12 col-md-8 mb-3">
                        <div class="about-us-content">

                            <div class="section-heading">
                                <p>FLASH GLOBAL VENTURES SDN. BHD.</p>
                                <h2><span>Let Us Tell You</span> Our Story</h2>
                                <img src="/img/core-img/decor.png" alt="">
                            </div>
                            <div class="famie-video-play d-md-none">
                                <img src="https://flashglobalventures.com/uploads/RVDSNfjAEsZ6hGQXPg5HOWuu039k_IOI.jpg" class="rounded-circle" alt="">
                            </div>
                            <p>
                                FLASH GLOBAL VENTURES SDN. BHD. has been engaged in fruit wholesale for many years. It is a fruit company integrating fruit and by-products retail, fruit agency sales, boutique fruit and by-products wholesale, and imported fruit and by-products wholesale. Its business nature is a comprehensive fruit wholesale and retail distribution center, with various wholesale operations. A variety of imported and domestic high-, middle- and low-end fruits, and cooperation with many domestic and foreign production bases, has accumulated mature and extensive purchase channels. The company adheres to the green and pollution-free, green ecological standards and the principles of customer health and customer satisfaction, and launches exquisite products for customers . </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 d-none d-md-block">
                        <div class="famie-video-play">
                            <img src="https://flashglobalventures.com/uploads/RVDSNfjAEsZ6hGQXPg5HOWuu039k_IOI.jpg" class="rounded-circle" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="famie-benefits-area">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 col-sm-4 col-lg">
                        <div class="text-center">
                            <img src="https://flashglobalventures.com/uploads/lHCAioRRXtaO_qTwm2N7NCjqGBqgaL_T.png" alt="">
                            <h5>Best Services</h5>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 col-lg">
                        <div class="text-center">
                            <img src="https://flashglobalventures.com/uploads/BI-R8x1zEb8-g3Wiz_E9mZITERxCAXh7.png" alt="">
                            <h5>Farm Direct</h5>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 col-lg">
                        <div class="text-center">
                            <img src="https://flashglobalventures.com/uploads/HrMyNoDlU2QJ8M0ID4exjBbL6amcxpfL.png" alt="">
                            <h5>100% Natural</h5>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 col-lg">
                        <div class="text-center">
                            <img src="https://flashglobalventures.com/uploads/9OY1rCibP9J6U9dBjFJfFpFQP5Gf-JNX.png" alt="">
                            <h5>Farm Logistics</h5>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 col-lg">
                        <div class="text-center">
                            <img src="https://flashglobalventures.com/uploads/bHC7YAyZBL_a9-tu7GTGQpAFtZCPAvmz.png" alt="">
                            <h5>Organic Fruit</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="farming-practice-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="section-heading text-center">
                            <p></p>
                            <h2><span>Transportation</span></h2>
                            <img src="/img/core-img/decor2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-farming-practice-area mb-50 wow fadeInUp">
                            <div class="farming-practice-thumbnail">
                                <img src="https://flashglobalventures.com/uploads/p86kyc7K22TCYL0yBdyvw7k8CeTJAUNu.jpg" alt="">
                            </div>

                            <div class="farming-practice-content text-center">

                                <div class="farming-icon">
                                    <img src="/img/core-img/sprout.png" alt="">
                                </div>
                                <h4>Customs Clearance</h4>
                                <p>Direct sales are launched at two major gateways in Guangzhou and Shanghai.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-farming-practice-area mb-50 wow fadeInUp">

                            <div class="farming-practice-thumbnail">
                                <img src="https://flashglobalventures.com/uploads/4v7NIHaiTOBXEPffJLR3sG8IevxjY7er.jpg" alt="">
                            </div>

                            <div class="farming-practice-content text-center">

                                <div class="farming-icon">
                                    <img src="/img/core-img/sprout.png" alt="">
                                </div>
                                <h4>Air Transport</h4>
                                <p>Directly sourced from global origin, fresh air delivered.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-farming-practice-area mb-50 wow fadeInUp">

                            <div class="farming-practice-thumbnail">
                                <img src="https://flashglobalventures.com/uploads/-vdvFNtCWStuzf4pzTAljhCd7mx-cXMB.jpg" alt="">
                            </div>

                            <div class="farming-practice-content text-center">

                                <div class="farming-icon">
                                    <img src="/img/core-img/sprout.png" alt="">
                                </div>
                                <h4>Shipping</h4>
                                <p>The cost of importing fruits is low by shipping containers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-8 mb-4 mb-lg-0">
                <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-lg-3">
                        <button type="submit" class="main_btn">Send Message</button>
                    </div>
                </form>


            </div>

            <div class="col-lg-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Buttonwood, California.</h3>
                        <p>Rosemead, CA 91770</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--================End Home Banner Area =================-->
@endsection
