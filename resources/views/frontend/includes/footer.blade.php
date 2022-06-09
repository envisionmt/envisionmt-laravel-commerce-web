@php
    $route = request()->route();
@endphp

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-unstyled">
                            <li><a href="{{ $route->named('frontend.sites.index') ? '' : route('frontend.sites.index') }}#about-section">About Us</a></li>
                            <li><a href="{{ route('frontend.sites.page', 'privacy') }}">Privacy</a></li>
                            <li><a href="{{ $route->named('frontend.sites.index') ? '' : route('frontend.sites.index') }}#contact-section">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        Copyright &copy; {{ env('APP_NAME') }} (Malaysia) {{ date('Y') }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>
