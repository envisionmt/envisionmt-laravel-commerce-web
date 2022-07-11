@php
    $route = request()->route();
@endphp

<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: +01 256 25 235</p>
                        <p>Email: jdfintech2022@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('frontend.sites.index') }}">
                    <img src="{{ asset('frontend/img/logo.png') }}" alt=""/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item {{ $route->named('frontend.sites.index') ? 'active' : '' }}"><a
                                        href="{{ route('frontend.sites.index') }}" class="nav-link">{{ __('message.home') }}</a></li>
                                <li class="nav-item {{ $route->named('frontend.sites.about') ? 'active' : '' }}"><a
                                        href="{{ route('frontend.sites.about') }}" class="nav-link">{{ __('message.about') }}</a></li>
                                <li class="nav-item {{ $route->named('frontend.products.index') ? 'active' : '' }}"><a
                                        href="{{ route('frontend.products.index') }}" class="nav-link">{{ __('message.shop') }}</a></li>
                                <li class="nav-item {{ $route->named('frontend.sites.contact-us') ? 'active' : '' }}">
                                    <a class="nav-link"
                                       href="{{ route('frontend.sites.contact-us') }}">{{ __('message.contact') }}</a>
                                </li>

                                @if(Auth()->check())
                                    <li class="nav-item {{ $route->named('frontend.user.profile') ? 'active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('frontend.user.profile') }}">{{ __('message.profile') }}</a>
                                    </li>
                                    <li class="nav-item {{ $route->named('frontend.user.invoice') ? 'active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('frontend.user.invoice') }}">{{ __('message.invoice') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link {{ $route->named('login') ? 'active' : '' }}"
                                           href="{{ route('login') }}">{{ __('message.login') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                <li class="nav-item">
                                    <a href="{{ route('frontend.products.cart') }}" class="icons">
                                        <i class="ti-shopping-cart"></i>
                                        <span class="nav-shop__circle">{{ Cart::count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="icons"
                                       href="{!! route('frontend.sites.change-language', ['en']) !!}">{{ __('message.english') }}</a>
                                    <a class="icons"
                                       href="{!! route('frontend.sites.change-language', ['zh-CN']) !!}">{{ __('message.chinese') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->
