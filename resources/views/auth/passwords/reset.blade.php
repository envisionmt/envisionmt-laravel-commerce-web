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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email">{{ __('message.email') }} *</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="{{ __('message.email_address') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('message.password') }} *</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('message.password') }}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{ __('message.password_confirmation') }} *</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('message.password_confirmation') }}">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">{{ __('message.reset_password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
