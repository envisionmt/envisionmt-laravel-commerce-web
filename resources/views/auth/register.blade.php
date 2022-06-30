@extends('frontend.layouts.app')

@section('content')
    <main class="main login-page">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0 text-center">Register</h1>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="login-popup col-lg-6 mx-auto">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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
                        <div class="form-group">
                            <label for="password">Password Confirmation *</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" placeholder="Password Confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                        <p class="mt-5">
                            <a class="btn btn-link" href="{{ route('login') }}">
                                Already member? Login Now
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
