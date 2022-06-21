@extends('.layouts.auth_Employer')

@section('content')

    <div class="col-sm-8">
        <div class="sign-in">
            <div class=" my-5">
                <div class="employer-content">
                    <a class="select-btn " href="{{route('show-login-emp')}}">
                        <span>Đăng nhập</span>
                    </a>

                    <a class="select-btn active-em" >
                        <span>Đăng ký</span>
                    </a>
                </div>

                <div class="employer-content-info px-5">
                    <h2 class="content-title m-0 py-5">Đăng ký tài khoản</h2>

                    <form action="{{route('register-emp')}}" method="post">
                        @csrf
                        <input type="hidden" value="3" name="account_type">
                        <input type="hidden" value="0" name="status">

                        <div class="mb-3 ">
                            <label class="form-label fw-bold">Địa chỉ Email <span>*</span> </label>
                            <input type="email" name="email" class="form-control py-2" value="{{old('email')}}" id="name" placeholder="name@gmail.com" >

                            @if($errors->has('email'))
                                <span class="text text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Mật khẩu <span>*</span></label>
                            <input type="password" name="password" class="form-control py-2" id="password" placeholder="**********" >

                            @if($errors->has('password'))
                                <span class="text text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Họ tên <span>*</span></label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control py-2" placeholder="Họ tên...">

                            @if($errors->has('name'))
                                <span class="text text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Số điện thoại <span>*</span></label>
                            <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control py-2" placeholder="Số điện thoại...">

                            @if($errors->has('phone_number'))
                                <span class="text text-danger">{{$errors->first('phone_number')}}</span>
                            @endif
                        </div>

                        <h4 class="content-text my-4">Thông tin công ty</h4>
                        <div class="mb-3">
                            <label class="form-label fw-bold"
                            >Tên công ty <span>*</span>
                            </label>
                            <input
                                name="company"
                                type="text"
                                class="form-control py-2"
                                id="name"
                                value="{{old('company')}}"
                                placeholder="Tên công ty..."
                            />
                            @if($errors->has('company'))
                                <span class="text text-danger">{{$errors->first('company')}}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"
                            >Website công ty <span>*</span>
                            </label>
                            <input
                                name="website"
                                type="text"
                                class="form-control py-2"
                                id="name"
                                value="{{old('website')}}"
                                placeholder="Website..."
                            />
                            @if($errors->has('website'))
                                <span class="text text-danger">{{$errors->first('website')}}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Địa chỉ <span>*</span> </label>
                            <input
                                name="address"
                                type="text"
                                class="form-control py-2"
                                id="name"
                                value="{{old('address')}}"
                                placeholder="Địa chỉ..."
                            />
                            @if($errors->has('address'))
                                <span class="text text-danger">{{$errors->first('address')}}</span>
                            @endif
                        </div>

                        <div class="my-4">
                            <input
                                class="btn btn-submit w-100 px-4 py-2"
                                type="submit"
                                value="Đăng ký"
                            />
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
