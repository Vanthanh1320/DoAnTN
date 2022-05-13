@extends('.layouts.main')

@section('content')

    <div class="wrap">

        <div class="container">
            <div class="acount content-sm px-5 py-4 mb-5">
                <h2 class="acount-head mb-4">
                    Tài khoản nhà tuyển dụng
                </h2>

                {{--                @if(session('success'))--}}
                {{--                    {{session('success')}}--}}
                {{--                @endif--}}

                <hr style="color: #D2D2D2;">

                <form action="{{route('account-epl')}}" method="post" class="account-form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-3 col-form-label fw-bold">Tên công ty:</label>
                                <div class="col-sm-9">
                                    <div class="change-form mt-1">
                                        <p class=" mb-0">{{$account->company}}</p>

                                        <div class="input-change hide">
                                            <input type="text" value="{{$account->company}}" class="form-control mb-3"  name="company">

                                        </div>
                                        <span class="btn-change ms-4">Thay đổi</span>
                                        <span class="btn-close-change ms-4 hide"><i class="fa-regular fa-circle-xmark"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-3 col-form-label fw-bold">Số điện thoại:</label>
                                <div class="col-sm-9">
                                    <div class="change-form mt-1">
                                        <p class=" mb-0">{{$account->phone_number}}</p>

                                        <div class="input-change hide">
                                            <input type="text" value="{{$account->phone_number}}" class="form-control mb-3"  name="phone_number">

                                        </div>
                                        <span class="btn-change ms-4">Thay đổi</span>
                                        <span class="btn-close-change ms-4 hide"><i class="fa-regular fa-circle-xmark"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-3 col-form-label fw-bold">Website công ty:</label>

                                <div class="col-sm-9">
                                    <div class="change-form mt-1">
                                        <p class=" mb-0">{{$account->website}}</p>

                                        <div class="input-change hide">
                                            <input type="text" value="{{$account->website}}" class="form-control mb-3"  name="website">

                                        </div>
                                        <span class="btn-change ms-4">Thay đổi</span>
                                        <span class="btn-close-change ms-4 hide"><i class="fa-regular fa-circle-xmark"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-3 col-form-label fw-bold">Địa chỉ:</label>

                                <div class="col-sm-9">
                                    <div class="change-form mt-1">
                                        <p class=" mb-0">{{$account->address}}</p>

                                        <div class="input-change hide">
                                            <input type="text" value="{{$account->address}}" class="form-control mb-3" name="address">

                                        </div>
                                        <span class="btn-change ms-4">Thay đổi</span>
                                        <span class="btn-close-change ms-4 hide"><i class="fa-regular fa-circle-xmark"></i></span>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-4">
                            <div class="account-right">
                                <div class="account-right-img">
                                    <img src="{{$account->image !== null ? 'img/'.$account->image : 'img/account/neolab.png'}} " alt="img-account">
                                </div>

                                <div class="account-right-btn">
                                    <label for="image" class="btn-img">Chọn ảnh</label>
                                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" onchange="loadFile(event)">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="my-2 text-center">
                        <input class="btn btn-submit px-4 " type="submit" value="Cập nhập">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
