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


@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="content py-5 px-5">
            <div class="row">
                <div class="col-6">
                    <div class="content-left">
                        <h3 class="content__head mb-4">
                            Chào mừng đến
                            <img src="{{url('users')}}/img/logo-black.png" alt="" class="content__head-logo">
                        </h3>

                        <div class="content-box">
                            <div class="content__select">
                                <a class="content__select-btn active-btn" >
                                    <span>Đăng nhập</span>
                                </a>

                                <a class="content__select-btn" href="{{url('register')}}">
                                    <span>Đăng ký</span>
                                </a>
                            </div>

                            <h2 class="content-title my-4">Đăng nhập tài khoản</h2>

                            <div class="content-validation px-5">
                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="2" name="account_type">

                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ Email <span>*</span> </label>
                                        <input type="email" name="email" class="form-control "  id="email" value="{{old('email')}}" placeholder="name@example.com">
                                        @if($errors->has('email'))
                                            <span class="text text-danger">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu <span>*</span></label>
                                        <input type="password" name="password" class="form-control"  id="password" value="{{old('password')}}" placeholder="**********">
                                        @if($errors->has('password'))
                                            <span class="text text-danger">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>

                                    <div class="my-4">
                                        <input class="btn btn-submit w-100 px-4" type="submit" value="Đăng nhập">
                                    </div>
                                </form>
                            </div>

                            <div class="text-center">
                                <p>
                                    {{--                                    Bạn chưa có tài khoản?--}}
                                    <a href="" class="signup-link">Bạn quên mật khẩu</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="content-right px-3 my-auto">
                        <img src="{{url('users')}}/img/img1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
