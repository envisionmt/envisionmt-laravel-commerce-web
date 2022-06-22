@extends('frontend.layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="col-lg-6 mx-auto">
            <form action="{{ route('frontend.auth.handle-register') }}" method="post">
            @csrf
            @include('frontend.includes.alert')
                <div class="form-outline mb-4">
                    @include('frontend.fields.name')
                </div>
                <div class="form-outline mb-4">
                    @include('frontend.fields.email')
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    @include('frontend.fields.password')
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    @include('frontend.fields.password-confirmation')
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Simple link -->
                        <p>
                            <a href="#!">Login with your account?</a>
                        </p>
                        <p>
                            <a href="#!">Forgot password?</a>
                        </p>

                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Register New Account</button>

            </form>
        </div>
    </div>
@endsection
