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

                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-xl-8" >
                    <form method="post" class="form">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="cv-personal content px-3 px-sm-4 px-md-5 py-4">
                                    <!-- <h2 >Tiêu đề</h2> -->

                                    <div class="row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tiêu đề <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" id="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4 mt-0" id="list-item-1">
                                <div class="cv-personal content px-3 px-sm-4 px-md-5 py-4" >
                                    <h2 >Thông tin cá nhân</h2>

                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-form-label">Ảnh </label>

                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <div class="upload-img px-3 py-3">
                                                <div class="upload-img-main">
                                                    <div class="upload">
                                                        <input type="file" id="image_uploads" name="image_uploads" accept=".jpg, .jpeg, .png" multiple="">
                                                        <label for="image_uploads">
                                                            <p class="m-0">Thêm ảnh</p>
                                                            <i class="fa-solid fa-circle-plus"></i>
                                                        </label>
                                                    </div>

                                                    <div class="img">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Họ tên <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" id="" required>
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Vị trí ứng tuyển <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" id="" required>
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Email <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="email" class="form-control" id="" required>
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Điện thoại <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="number" class="form-control" id="" required>
                                        </div>
                                    </div>
                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Giới tính <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5 d-flex justify-content-center align-items-center">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineRadio1">Nam</label>
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Ngày sinh <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="date" class="form-control" id="" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Địa chỉ cụ thể <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-5">
                                            <input type="text" class="form-control" id="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4 mt-0" id="list-item-2">

                                <div class="cv-introduce content px-3 px-sm-4 px-md-5 py-4" >
                                    <h2>Giới thiệu bản thân</h2>

                                    <div class="py-2 row">
                                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label h-100">Giới thiệu bản thân <span class=" red-cl">(*)</span></label>
                                        <div class="col-sm-7 col-md-7 col-xl-8">
                                            <textarea name="mota" class="form-control" id="" cols="50" rows="8" required></textarea>
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
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tên công ty <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" name="company-0" id="" required>
                                                </div>

                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thời gian làm việc <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" name="time-0" id="" required>
                                                </div>
                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Vị trí công việc <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" name="posistion-0" id="" required>
                                                </div>
                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Chi tiết công việc </label>
                                                <div class="col-sm-7 col-md-7 col-xl-8">
                                                    <textarea class="form-control" name="description-0" id="" cols="50" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="cv-experience-remove col-sm-2 text-end top-0">
                                                <span class="btn btn-danger experience-remove" >Xóa</span>
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
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tên trường cơ sở đào tạo <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" name="school-0" id="" required>
                                                </div>
                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thời gian học <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" name="year-0" id="" required>
                                                </div>
                                            </div>
                                            <div class="mb-5 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Ngành học <span class=" red-cl">(*)</span></label>
                                                <div class="col-sm-7 col-md-7 col-xl-5">
                                                    <input type="text" class="form-control" name="degree-0" id="" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thông tin khác </label>
                                                <div class="col-sm-7 col-md-7 col-xl-8">
                                                    <textarea class="form-control" name="info-0" id="" cols="50" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="cv-education-remove col-sm-2 text-end top-0">
                                                <span class="btn btn-danger experience-remove" >Xóa</span>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="col-sm-12 my-4 cv-education-add text-end ">
                                        <span class="btn btn-light education-add">Thêm học vấn khác</span>
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
