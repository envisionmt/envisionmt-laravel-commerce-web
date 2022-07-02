@extends('frontend.layouts.app')

@section('content')
    <main class="main login-page">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0 text-center">{{ __('message.reset_password') }}</h1>
            </div>
        </div>

        <div class="page-content mb-5">
            <div class="container">
                <div class="login-popup col-lg-6 mx-auto">
                    @if (session('status'))
                        <div class="alert alert-success mb-5" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('message.email') }} *</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="{{ __('message.email_address') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">{{ __('message.send_password_reset_link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
