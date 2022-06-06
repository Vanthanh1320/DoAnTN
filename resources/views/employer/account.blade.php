@extends('.layouts.main-employer')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Tài khoản nhà tuyển dụng</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <form action="{{route('account-epl')}}" method="post" class="user-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="header-post col-12 mb-3">
                                            <h4 class="card-title m-0">Thông tin tài khoản</h4>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label fw-bold">Địa chỉ email:</label>
                                            <div class="col-sm-7">
                                                <input type="text" value="{{$user->email}}" class="form-control mb-3" disabled>

                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-3 col-form-label fw-bold">Họ và tên:</label>
                                            <div class="col-sm-7">
                                                <input type="text" value="{{$user->name}}" class="form-control mb-3"  name="name">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-3 col-form-label fw-bold">Số điện thoại:</label>
                                            <div class="col-sm-7">
                                                <input type="text" value="{{$user->phone_number}}" class="form-control mb-3"  name="phone_number">
                                            </div>
                                        </div>

                                        <div class="header-post col-12 mb-3">
                                            <h4 class="card-title m-0">Thông tin công ty</h4>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-3 col-form-label fw-bold">Tên công ty:</label>
                                            <div class="col-sm-7">
                                                <input type="text" value="{{$user->company}}" class="form-control mb-3"  name="company">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-3 col-form-label fw-bold">Website:</label>
                                            <div class="col-sm-7">
                                                <input type="text" value="{{$user->website}}" class="form-control mb-3"  name="website">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-3 col-form-label fw-bold">Địa chỉ:</label>
                                            <div class="col-sm-7">
                                                <input type="text" value="{{$user->address}}" class="form-control mb-3" name="address">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1">
                                                        <img src="{{url('empl/img').'/'.$user->image}}" alt="user" />
                                                    </div>
                                                    <div class="el-card-content">
                                                        <label for="image" class="btn-img">Chọn ảnh</label>
                                                        <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" onchange="loadFile(event)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-2 text-center">
                                    <input class="btn btn-cyan btn-sm text-white mx-2 px-4 py-2" type="submit" value="Cập nhập">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </form>
        </div>



@endsection
