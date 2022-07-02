@extends('frontend.layouts.app')

@section('content')
    <main class="main">
        <div class="page-header" style="height: 180px;">
            <div class="container">
                <h1 class="page-title mb-0 text-center">{{ __('message.verify_your_email_address') }}</h1>
            </div>
        </div>


        <div class="page-content faq mb-5">
            <div class="container">
                <section class="content-title-section  col-lg-6 mx-auto">
                    <div class="text-center mt-10 mb-10">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('message.a_fresh_verification_link_has_been_sent_to_your_email_address') }}
                            </div>
                        @endif

                        <p>
                            {{ __('message.before_proceeding_please_check_your_email_for_a_verification_link') }}
                        </p>

                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            {{ __('message.if_you_did_not_receive_the_email_click') }}
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size: 16px">
                                {{ __('message.here') }}
                            </button>
                            {{ __('message.to_request_another') }}
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
