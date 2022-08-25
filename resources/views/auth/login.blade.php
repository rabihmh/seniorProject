@extends('layouts.master2')
@section('css')
    {{-- Sidemenu-respoansive-tabs css --}}
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}"
          rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{URL::asset('assets/img/media/login.png')}}"
                             class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><a href=""><img
                                                src="{{URL::asset('assets/img/brand/favicon.png')}}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>Welcome back!</h2>
                                            <h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="Enter your email"
                                                           id="email" type="email" name="email"
                                                           autocomplete="email"
                                                    >
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input id="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           placeholder="Enter your password" type="password"
                                                           name="password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>&nbsp;
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                                <button class="btn btn-main-primary btn-block">Sign In</button>
                                                <div class="row row-xs">
                                                    <div class="col-sm-6">

                                                        <a  href="{{ url('auth/google') }}" class="btn  btn-block "><i class="fab fa-google"></i>
                                                            Signup with Google
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                        <button class="btn btn-info btn-block"><i
                                                                class="fab fa-twitter"></i> Signup with Twitter
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                                <p>Don't have an account? <a href="{{ route('register') }}">Create an
                                                        Account</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
