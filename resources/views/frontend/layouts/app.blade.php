<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend/img/favicon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('frontend/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.png')}}">
    <link rel="icon" type="image/ico" href="{{asset('frontend/img/favicon.png')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('before-styles')

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/lightbox/simpleLightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/jquery-ui/jquery-ui.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />

    @stack('after-styles')
</head>

<body>

    @include('frontend.includes.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.includes.footer')

</body>

<!-- Scripts -->
@stack('before-scripts')

<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/stellar.js') }}"></script>
<script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/isotope/isotope-min.js') }}"></script>
<script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/counter-up/jquery.counterup.js') }}"></script>
<script src="{{ asset('frontend/js/mail-script.js') }}"></script>
<script src="{{ asset('frontend/js/theme.js') }}"></script>

@stack('after-scripts')

</html>
