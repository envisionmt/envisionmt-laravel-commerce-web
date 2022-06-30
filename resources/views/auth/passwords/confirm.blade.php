@extends('frontend.layouts.app')

@section('content')
    <main class="main login-page">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0 text-center">Confirm password</h1>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="login-popup col-lg-6 mx-auto">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <p class="text-center mb-5">
                            Please confirm your password before continuing.
                        </p>

                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Confirm Password</button>

                        <p class="mt-3">
                            <a href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
