@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Profile</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">Home</a>
                        <a href="{{ route('frontend.user.profile') }}">Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('backend/img/avatar.png') }}" alt="User profile picture">
                            </div>

                            <h4 class="profile-username text-center">{{ $user->name }}</h4>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Email: </b> <a>{{ $user->email }}</a>
                                </li>
                            </ul>
                            <a href="{{ route('frontend.auth.logout') }}" class="nav-link"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                out</a>
                            <form id="logout-form" action="{{ route('frontend.auth.logout') }}"
                                  method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    @include('backend.components.alert')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update information</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('frontend.user.putProfile') }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Name"
                                               name="name" value="{{ old('name', $user->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Email"
                                               name="email" value="{{ old('email', $user->email) }}">
                                        @if ($errors->has('email'))
                                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger mr-2">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
@endsection
