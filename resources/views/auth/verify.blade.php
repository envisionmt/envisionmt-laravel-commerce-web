@extends('frontend.layouts.app')

@section('content')
    <main class="main">
        <div class="page-header" style="height: 180px;">
            <div class="container">
                <h1 class="page-title mb-0 text-center">Verify Your Email Address</h1>
            </div>
        </div>


        <div class="page-content faq mb-5">
            <div class="container">
                <section class="content-title-section  col-lg-6 mx-auto">
                    <div class="text-center mt-10 mb-10">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                A fresh verification link has been sent to your email address.
                            </div>
                        @endif

                        <p>
                            Before proceeding, please check your email for a verification link.
                        </p>

                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            If you did not receive the email, click
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size: 16px">
                                here
                            </button>
                            to request another.
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
