@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="d-flex flex-column">
        <img src="{{ asset('templete/assets/img/bglogin1.png') }}" style=" max-width: 100%; max-height: 100vh" alt="">

        <div class=" position-absolute container " style="top: 200px; left:130px">

            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header ">
                            <h2 class="text-danger"> <b></b>{{ __('SIGN IN') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="name@example.com" />
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-floating mb-3">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="password" />
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-floating mb-3">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Password') }}
                                        </label>
                                    </div>

                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Login') }}
                                    </button>
                                </div>


                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
