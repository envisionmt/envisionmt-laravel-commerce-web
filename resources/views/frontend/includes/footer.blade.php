@php
    $route = request()->route();
@endphp

<!--================ start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 single-footer-widget">
                <p><i class="fa fa-map-pin" aria-hidden="true"></i> <span>21-1, Jalan DU 1/2, Taman Damai Utama, 47180 Puchong Selangor, Malaysia</span>
                </p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> <span>fintechjd@gmail.com</span>
                </p>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('frontend.sites.index') }}">{{ __('message.home') }}</a></li>
                    <li><a href="{{ route('register') }}">{{ __('message.register') }}</a></li>
                    <li><a href="{{ route('frontend.sites.contact-us') }}">{{ __('message.contact') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Resources</h4>
                <ul>
                    <li>
                        <a href="{{ route('frontend.sites.page', 'terms-conditions') }}">{{ __('message.terms_and_conditions') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.sites.page', 'privacy-policy') }}">{{ __('message.privacy_policy') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.sites.page', 'refund-policy') }}">{{ __('message.refund_policy') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                Copyright &copy;{{ date('Y') }} All rights reserved | {{ env('APP_NAME') }}
            </p>
        </div>
    </div>
</footer>
