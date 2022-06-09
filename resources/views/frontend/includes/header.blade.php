@php
    $route = request()->route();
@endphp

<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span
                            class="d-none d-md-inline-block">info@brainstormt.com</span></a>
                    <span class="mx-md-2 d-inline-block"></span>
                    <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">+60 128720270</span></a>

                </div>

            </div>

        </div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">


                <div class="site-logo">
                    <a href="/" class="text-black"><span class="text-primary">{{ env('APP_NAME') }}</a>
                </div>

                <div class="col-12">
                    <nav class="site-navigation text-right ml-auto " role="navigation">

                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li><a href="{{ $route->named('frontend.sites.index') ? '' : route('frontend.sites.index') }}#home-section" class="nav-link">Home</a></li>
                            <li><a href="{{ $route->named('frontend.sites.index') ? '' : route('frontend.sites.index') }}#services-section" class="nav-link">Services</a></li>

                            <li>
                                <a href="{{ $route->named('frontend.sites.index') ? '' : route('frontend.sites.index') }}#about-section" class="nav-link">About Us</a>

                            </li>
                            <li><a href="{{ $route->named('frontend.sites.index') ? '' : route('frontend.sites.index') }}#why-us-section" class="nav-link">Why Us</a></li>
                            <li><a href="{{ $route->named('frontend.sites.index') ? '' : route('frontend.sites.index') }}#contact-section" class="nav-link">Contact</a></li>
                        </ul>
                    </nav>

                </div>

                <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

            </div>
        </div>

    </header>
</div>
