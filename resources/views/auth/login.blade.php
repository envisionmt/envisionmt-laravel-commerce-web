@extends('frontend.layouts.app')

@section('content')
    <main class="main login-page">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0 text-center">Login</h1>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="col-lg-6 mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email address" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember me</label>
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <p class="mt-5">
                            <a class="btn btn-link" href="{{ route('register') }}">
                                Haven't account? Register now
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
