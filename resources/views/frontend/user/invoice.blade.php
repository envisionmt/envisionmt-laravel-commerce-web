@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Invoice</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">Home</a>
                        <a href="{{ route('frontend.user.invoice') }}">Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
@endsection
