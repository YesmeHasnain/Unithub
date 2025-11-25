@extends('layouts.auth')

@section('title', 'Login | Jampack')

@section('content')
    <div class="row auth-split">
        <div class="col-xl-5 col-lg-6 col-md-7 position-relative mx-auto">
            <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                <div class="text-center mb-7">
                    <a class="navbar-brand me-0" href="{{ url('/') }}">
                        <img class="brand-img d-inline-block" src="{{ asset('dist/img/logo-light.png') }}" alt="brand">
                    </a>
                </div>

                <form class="w-100" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-7 col-sm-10 mx-auto">
                            <div class="text-center mb-4">
                                <h4>Sign in to your account</h4>
                                <p>There are many variations of passages of Lorem Ipsum available, in some form, by injected humour</p>
                            </div>

                            <div class="row gx-3">
                                <div class="form-group col-lg-12">
                                    <div class="form-label-group">
                                        <label>Email</label>
                                    </div>
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter email ID"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                    >
                                    @error('email')
                                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="form-label-group d-flex justify-content-between">
                                        <label>Password</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="fs-7 fw-medium">Forgot Password ?</a>
                                        @endif
                                    </div>
                                    <div class="input-group password-check">
                                        <span class="input-affix-wrapper affix-wth-text">
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter your password"
                                                type="password"
                                                name="password"
                                                required
                                            >
                                            <a href="#" class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                <span>Show</span>
                                                <span class="d-none">Hide</span>
                                            </a>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <div class="form-check form-check-sm mb-3">
                                    <input type="checkbox" class="form-check-input" id="logged_in"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted fs-7" for="logged_in">
                                        Keep me logged in
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-uppercase btn-block">Login</button>

                            <p class="p-xs mt-2 text-center">
                                New to Jampack?
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"><u>Create new account</u></a>
                                @endif
                            </p>

                            <a href="#" class="d-block extr-link text-center mt-4">
                                <span class="feather-icon"><i data-feather="external-link"></i></span>
                                <u class="text-muted">Send feedback to our help forum</u>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="hk-footer border-0">
                <footer class="container-xxl footer">
                    <div class="row">
                        <div class="col-xl-8 text-center">
                            <p class="footer-text pb-0">
                                <span class="copy-text">Jampack © 2023 All rights reserved.</span>
                                <a href="#" target="_blank">Privacy Policy</a>
                                <span class="footer-link-sep">|</span>
                                <a href="#" target="_blank">T&C</a>
                                <span class="footer-link-sep">|</span>
                                <a href="#" target="_blank">System Status</a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="col-xl-7 col-lg-6 col-md-5 col-sm-10 d-md-block d-none position-relative bg-primary-light-5">
            <div class="auth-content flex-column text-center py-8">
                <div class="row">
                    <div class="col-xxl-7 col-xl-8 col-lg-11 mx-auto">
                        <h2 class="mb-4">Meet all new Pro Jampack 2.0</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, passages of Lorem Ipsum available, in some form, by injected.</p>
                        <button class="btn btn-flush-primary btn-uppercase mt-2" type="button">Take Tour</button>
                    </div>
                </div>
                <img src="{{ asset('dist/img/macaroni-logged-out.png') }}"  class="img-fluid w-sm-50 mt-7" alt="login"/>
            </div>
            <p class="p-xs credit-text opacity-55">
                All illustration are powered by
                <a href="https://icons8.com/ouch/" target="_blank" class="text-light"><u>Icons8</u></a>
            </p>
        </div>
    </div>
@endsection
