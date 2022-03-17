{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('master')

@section('title') {{ env("APP_NAME") }} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="">
                    <div class="sign-in-form">
                        <h4 class="text-primary fw-bold text-center">Sign In</h4>
                        <p class="text-center">
                            Doesn't have an account yet?
                            <a href="{{ route('register') }}">Sign up here</a>
                        </p>
                        <a href="#" class="btn rounded btn-outline-dark w-100">
                            Sign in with Google
                        </a>
                        <hr class="my-4">

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-user"></i>
                                    Username
                                </label>
                                <input type="text" value="{{ old('email') }}" name="email" class="form-control form-control-lg rounded @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-lock"></i>
                                    Password
                                </label>
                                <input type="password" class="form-control form-control-lg rounded @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg rounded w-100">Sign In</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="bg-primary text-light d-flex justify-content-center align-items-center edit-profile-footer">
        <p class="mb-0">
            &copy; {{ date('Y') }} United Wood Industries. All Right Reversed.
        </p>
    </div>
@endsection

