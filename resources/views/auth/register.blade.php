@extends('layouts.auth')

@section('title', 'Signup | Jampack')

@section('content')
    <div class="row auth-split">
        {{-- LEFT SIDE – form (same width/position as login) --}}
        <div class="col-xl-5 col-lg-6 col-md-7 position-relative mx-auto">
            <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                <div class="text-center mb-7">
                    <a class="navbar-brand me-0" href="{{ url('/') }}">
                        <img class="brand-img d-inline-block" src="{{ asset('dist/img/logo-light.png') }}" alt="brand">
                    </a>
                </div>

                <form class="w-100" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-7 col-sm-10 mx-auto">
                            <div class="text-center mb-4">
                                <h4>Create your account</h4>
                                <p>Sign up to start using your Jampack dashboard.</p>
                            </div>

                            <div class="row gx-3">
                                {{-- Name --}}
                                <div class="form-group col-lg-12">
                                    <div class="form-label-group">
                                        <label>Name</label>
                                    </div>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter your name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus
                                    >
                                    @error('name')
                                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="form-group col-lg-12">
                                    <div class="form-label-group">
                                        <label>Email</label>
                                    </div>
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter your email ID"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                    >
                                    @error('email')
                                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="form-group col-lg-12">
                                    <div class="form-label-group">
                                        <label>Password</label>
                                    </div>
                                    <div class="input-group password-check">
                                        <span class="input-affix-wrapper affix-wth-text">
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="6+ characters"
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

                                {{-- Confirm Password --}}
                                <div class="form-group col-lg-12">
                                    <div class="form-label-group">
                                        <label>Confirm Password</label>
                                    </div>
                                    <input
                                        class="form-control"
                                        placeholder="Re-enter password"
                                        type="password"
                                        name="password_confirmation"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="form-check form-check-sm mb-3">
                                <input type="checkbox" class="form-check-input" id="terms_check" checked>
                                <label class="form-check-label text-muted fs-8" for="terms_check">
                                    By creating an account you agree to our
                                    <a href="#">Terms of use</a> and <a href="#">Privacy policy</a>.
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-uppercase btn-block">
                                Create account
                            </button>

                            <p class="p-xs mt-2 text-center">
                                Already a member ?
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}"><u>Sign In</u></a>
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

            {{-- footer same as login --}}
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

        {{-- RIGHT SIDE – bilkul login jaisa --}}
        <div class="col-xl-7 col-lg-6 col-md-5 col-sm-10 d-md-block d-none position-relative bg-primary-light-5">
            <div class="auth-content flex-column text-center py-8">
                <div class="row">
                    <div class="col-xxl-7 col-xl-8 col-lg-11 mx-auto">
                        <h2 class="mb-4">Meet all new Pro Jampack 2.0</h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            passages of Lorem Ipsum available, in some form, by injected.
                        </p>
                        <button class="btn btn-flush-primary btn-uppercase mt-2" type="button">
                            Take Tour
                        </button>
                    </div>
                </div>
                <img src="{{ asset('dist/img/macaroni-logged-out.png') }}"
                     class="img-fluid w-sm-50 mt-7"
                     alt="login"/>
            </div>
            <p class="p-xs credit-text opacity-55">
                All illustration are powered by
                <a href="https://icons8.com/ouch/" target="_blank" class="text-light"><u>Icons8</u></a>
            </p>
        </div>
    </div>
@endsection
