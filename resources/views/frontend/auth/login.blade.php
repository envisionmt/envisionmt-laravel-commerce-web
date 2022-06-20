@extends('frontend.layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="col-lg-6 mx-auto">
            <form action="{{ route('frontend.auth.authenticate') }}" method="post">
            @csrf
            @include('frontend.includes.alert')
            <!-- Email input -->
                <div class="form-outline mb-4">
                    @include('frontend.fields.email')
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    @include('frontend.fields.password')
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Simple link -->
                        <p>
                            <a href="#!">Register new account?</a>
                        </p>
                        <p>
                            <a href="#!">Forgot password?</a>
                        </p>

                    </div>
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" value=""
                                   checked/>
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

            </form>
        </div>
    </div>
@endsection
