
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
                                        <input type="email" name="email" class="form-control "  id="email" value="{{old('email')}}" placeholder="name@gmail.com">
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
