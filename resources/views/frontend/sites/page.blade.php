@extends('frontend.layouts.app')

@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>{{ $item->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                {!! $item->body !!}
            </div>
        </div>
    </section>
@endsection
