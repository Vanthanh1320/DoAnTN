@extends('.layouts.main')

@section('content')

    <div class="wrap">
        <div class="banner banner-other ">
            <div class="container">
            </div>
        </div>

        <div class="container-lg my-4">
            <div class="row g-4">
                <div class="col-sm-0 col-md-0 col-xl-4">
                    <div class="cv-btn content py-4 px-4">
                        <ul class="nav nav-pills cv-btn-list" id="list-example">
                            <li class="nav-item cv-btn-item">
                                <a class="nav-link btn" data-set="0" href="#list-item-1">
                                    <i class="fa-solid fa-user"></i>
                                    <p>Thông tin cá nhân</p>
                                </a>
                            </li>
                            <li class="nav-item cv-btn-item" >
                                <a class="nav-link btn" data-set="1" href="#list-item-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <p>Giới thiệu bản thân</p>
                                </a>
                            </li>
                            <li class="nav-item cv-btn-item">
                                <a class="nav-link btn" data-set="2" href="#list-item-3">
                                    <i class="fa-solid fa-suitcase"></i>
                                    <p>Kinh nghiệm làm việc</p>
                                </a>
                            </li>
                            <li class="nav-item cv-btn-item">
                                <a class="nav-link btn" data-set="3" href="#list-item-4">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <p>Học vấn</p>
                                </a>
                            </li>
                            <li class="nav-item cv-btn-item">
                                <a class="nav-link btn" data-set="4" href="#list-item-5">
                                    <i class="fa-solid fa-file-lines"></i>
                                    <p>Dự án</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-xl-8" >
                    <form method="post" class="form" action="{{route('cv.store')}}" enctype="multipart/form-data">
                        @if(session('errors'))
                            {{session('errors')}}
                        @endif

                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="cv-personal content px-3 px-sm-4 px-md-5 py-4">
                                    <!-- <h2 >Tiêu đề</h2> -->
                                    <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">

                                    <div class="row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Tiêu đề <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" value="{{old('title')}}" name="title">

                                            @if($errors->has('title'))
                                                <span class="text text-danger">{{$errors->first('title')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4 mt-0" id="list-item-1">
                                <div class="cv-personal content px-3 px-sm-4 px-md-5 py-4" >
                                    <h2 >Thông tin cá nhân</h2>

                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-form-label fw-bold">Ảnh </label>

                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <div class="upload-img px-3 py-3">
                                                <div class="upload-img-main">
                                                    <div class="upload">
                                                        <input type="file" id="image" name="image" onchange="loadFile(event)" accept=".jpg, .jpeg, .png" value="{{old('image')}}">
                                                        <label for="image">
                                                            <p class="m-0">Thêm ảnh</p>
                                                            <i class="fa-solid fa-circle-plus"></i>
                                                        </label>
                                                    </div>

                                                    <div class="img">
                                                        <img src="" class="img-img" alt="image" >

                                                        <div class="upload-img-hover">
                                                            <input type="file" id="image_uploads" onchange="loadFile(event)" name="image" accept=".jpg, .jpeg, .png" multiple="">

                                                            <label for="image_uploads">
                                                                <i class="fa-solid fa-upload"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Họ tên <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" value="{{old('name')}}" name="name">

                                            @if($errors->has('name'))
                                                <span class="text text-danger">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Vị trí ứng tuyển <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" value="{{old('position')}}" name="position">

                                            @if($errors->has('position'))
                                                <span class="text text-danger">{{$errors->first('position')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Email <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="email" class="form-control" value="{{old('email')}}" name="email">

                                            @if($errors->has('email'))
                                                <span class="text text-danger">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Điện thoại <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" value="{{old('phone_number')}}" name="phone_number">

                                            @if($errors->has('phone_number'))
                                                <span class="text text-danger">{{$errors->first('phone_number')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Giới tính <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5 d-flex justify-content-center align-items-center">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineRadio1">Nam</label>
                                                <input class="form-check-input" type="radio" name="male" id="inlineRadio1" value="1">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                                <input class="form-check-input" type="radio" name="male" id="inlineRadio2" value="2">
                                            </div>

                                            @if($errors->has('male'))
                                                <span class="text text-danger">{{$errors->first('male')}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Ngày sinh <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="date" class="form-control" value="{{old('dateOfBirth')}}" name="dateOfBirth">

                                            @if($errors->has('dateOfBirth'))
                                                <span class="text text-danger">{{$errors->first('dateOfBirth')}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Địa chỉ cụ thể <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" value="{{old('address')}}" name="address">

                                            @if($errors->has('address'))
                                                <span class="text text-danger">{{$errors->first('address')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4 mt-0" id="list-item-2">

                                <div class="cv-introduce content px-3 px-sm-4 px-md-5 py-4" >
                                    <h2>Giới thiệu bản thân</h2>

                                    <div class="py-2 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label h-100 fw-bold">Giới thiệu bản thân <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-8">
                                            <textarea id="editor1" class="form-control" value="{{old('introduce')}}" cols="50" rows="8" name="introduce">
                                                {{old('introduce')}}
                                            </textarea>

                                            @if($errors->has('introduce'))
                                                <span class="text text-danger">{{$errors->first('introduce')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4 mt-0" id="list-item-3">
                                <div class="cv-experience-box content px-3 px-sm-4 px-md-5 py-4">
                                    <ul class="cv-experience-list " >
                                        <h2>Kinh nghiệm làm việc</h2>

                                        <li>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Tên công ty <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" value="{{old('name_company.0')}}" name="name_company[]" >

                                                    @if($errors->has('name_company.0'))
                                                        <span class="text text-danger">{{$errors->first('name_company.0')}}</span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Thời gian làm việc <span class=" red-cl">(*)</span></label>

                                                <div class="col-sm-3 col-md-3 ">
                                                    <input type="date" class="form-control" value="{{old('start_time.0')}}" name="start_time[]" >

                                                    @if($errors->has('start_time.0'))
                                                        <span class="text text-danger">{{$errors->first('start_time.0')}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-3 col-md-3 ">
                                                    <input type="date" class="form-control" value="{{old('end_time.0')}}" name="end_time[]" >

                                                    @if($errors->has('end_time.0'))
                                                        <span class="text text-danger">{{$errors->first('end_time.0')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Vị trí công việc <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" value="{{old('job_position.0')}}" name="job_position[]" >

                                                    @if($errors->has('job_position.0'))
                                                        <span class="text text-danger">{{$errors->first('job_position.0')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Chi tiết công việc </label>
                                                <div class="col-sm-7 col-md-7 col-xl-8">
                                                    <textarea id="editor_exp1" class="form-control" name="job_details[]" cols="50" rows="5">
                                                        {{old('job_details[]')}}
                                                    </textarea>
                                                </div>
                                            </div>

                                        </li>

                                    </ul>

                                    <div class="col-sm-12 my-4 cv-experience-add text-end ">
                                        <span class="btn btn-light experience-add">Thêm công việc khác</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4 mt-0" id="list-item-4">
                                <div class="cv-education content px-3 px-sm-4 px-md-5 py-4" >
                                    <ul class="cv-education-list">
                                        <h2>Học vấn</h2>

                                        <li>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Tên trường cơ sở đào tạo <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" value="{{old('name_school.0')}}" name="name_school[]" >

                                                    @if($errors->has('name_school.0'))
                                                        <span class="text text-danger">{{$errors->first('name_school.0')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Thời gian học <span class=" red-cl">(*)</span></label>

                                                <div class="col-sm-3 col-md-3 ">
                                                    <input type="date" class="form-control" value="{{old('start_year.0')}}" name="start_year[]" >

                                                    @if($errors->has('start_year.0'))
                                                        <span class="text text-danger">{{$errors->first('start_year.0')}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-3 col-md-3 ">
                                                    <input type="date" class="form-control" value="{{old('end_ỷear.0')}}" name="end_year[]" >

                                                    @if($errors->has('end_year.0'))
                                                        <span class="text text-danger">{{$errors->first('end_year.0')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Ngành học <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" value="{{old('degree.0')}}" name="degree[]" >

                                                    @if($errors->has('degree.0'))
                                                        <span class="text text-danger">{{$errors->first('degree.0')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="col-sm-12 my-4 cv-education-add text-end ">
                                        <span class="btn btn-light education-add">Thêm học vấn khác</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4 mt-0" id="list-item-5">
                                <div class="cv-project content px-3 px-sm-4 px-md-5 py-4" >
                                    <ul class="cv-project-list">
                                        <h2>Dự án</h2>

                                        <li>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Tên dự án <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" value="{{old('name_project.0')}}" name="name_project[]" >

                                                    @if($errors->has('name_project.0'))
                                                        <span class="text text-danger">{{$errors->first('name_project.0')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label fw-bold">Thời gian dự án <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" value="{{old('time_project.0')}}" name="time_project[]" >

                                                    @if($errors->has('time_project.0'))
                                                        <span class="text text-danger">{{$errors->first('time_project.0')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="py-2 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label h-100 fw-bold">Giới thiệu dự án <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-8">
                                                    <textarea id="editor_pro1" class="form-control" cols="50" rows="8" name="introduce_pro[]">
                                                        {{old('introduce_pro')}}
                                                    </textarea>

                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="col-sm-12 my-4 cv-education-add text-end ">
                                        <span class="btn btn-light project-add">Thêm dự án khác</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 pt-4 mt-0">
                            <div class="content px-5 py-4 text-end">
                                <input type="submit" value="Hủy" class="btn btn-secondary">
                                <input type="submit" value="Lưu CV" class="btn btn-submit">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
