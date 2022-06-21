@extends('.layouts.auth_Employer')

@section('content')

    <div class="col-sm-8">
        <div class="sign-in">
            <div class=" my-5">
                <div class="employer-content">
                    <a class="select-btn active-em" >
                        <span>Đăng nhập</span>
                    </a>

                    <a class="select-btn " href="{{route('show-register-emp')}}">
                        <span>Đăng ký</span>
                    </a>
                </div>

                <div class="employer-content-info px-5">
                    <h2 class="content-title m-0 py-5">Đăng nhập tài khoản</h2>

                    <form action="{{route('login-emp')}}" method="post">
                        @csrf
                        <input type="hidden" value="3" name="account_type">

                        @if(session('error'))
                            <span class="text text-danger">{{session('error')}}</span>
                        @endif

                        <div class="mb-3 ">
                            <label class="form-label fw-bold">Địa chỉ Email <span>*</span> </label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control py-2" placeholder="name@gmail.com">

                            @if($errors->has('email'))
                                <span class="text text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mật khẩu <span>*</span></label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control py-2" placeholder="**********">

                            @if($errors->has('password'))
                                <span class="text text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>

                        <div class="my-4">
                            <input class="btn btn-submit w-100 px-4 py-2" type="submit" value="Đăng nhập">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
