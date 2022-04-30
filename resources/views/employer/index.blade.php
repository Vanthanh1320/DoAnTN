@extends('layouts.main')

@section('content')

    <div class="container my-4">
        <div class="employer-main content px-5 py-4 mb-5 show" id="posts">
            <div class="cv-manage-head">
                <h2 class="text-black">
                    Tuyển dụng
                </h2>

                <a href="/addPost.html" class="btn btn-submit">
                    <i class="fa-solid fa-address-card"></i>
                    Tạo bài tuyển dụng
                </a>
            </div>

            <div class="cv-manage-table">
                <table class="table align-middle">
                    <thead class="table-secondary">
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Vị trí</th>
                        <th>Mức lương</th>
                        <th>Ngày đăng</th>
                        <th>Trạng thái</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="align-top">
                        <td >1</td>
                        <td class="text-black">Frondend</td>
                        <td>Senior</td>
                        <td>10.000.000</td>
                        <td>30-03-2022 10:50:36</td>
                        <td>Duyệt</td>
                        <td>
                            <a href="/">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="/" class="mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="/">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="employer-main content px-5 py-4 mb-5" id="cabdidates">
            <div class="cv-manage-head">
                <form action="" class="d-flex">
                    <input type="text" placeholder="Tìm kiếm" class="form-control me-2">

                    <select class="form-select form-select me-2" aria-label=".form-select-lg example">
                        <option selected>Trạng thái</option>
                        <option value="1">Duyệt</option>
                        <option value="2">Chưa duyệt</option>
                    </select>

                    <button class="btn btn-submit" class="btn btn-submit ">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <a href="/" class="btn btn-success">
                    Dowload Excel
                </a>
            </div>

            <div class="cv-manage-table">
                <table class="table align-middle">
                    <thead class="table-secondary">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Vị trí ứng tuyển</th>
                        <th>Ngày ứng tuyển</th>
                        <th>Link CV</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="align-top text-center">
                        <td >1</td>
                        <td class="text-black">Frondend</td>
                        <td>Senior</td>
                        <td>10.000.000</td>
                        <td>30-03-2022 10:50:36</td>
                        <td>Duyệt</td>
                        <td>
                            <div class="form-check form-switch ">
                                <input class="form-check-input text-center" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="employer-main content px-5 py-4 mb-5" id="statiscal" >
            <div class="cv-manage-head">
                <form action="" class="d-flex">
                    <input type="text" placeholder="Tìm kiếm" class="form-control me-2">

                    <select class="form-select form-select-lg me-2" aria-label=".form-select-lg example">
                        <option selected>Trạng thái</option>
                        <option value="1">Duyệt</option>
                        <option value="2">Chưa duyệt</option>
                    </select>

                    <button class="btn btn-submit" class="btn btn-submit ">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <a href="/" class="btn btn-success">
                    Dowload Excel
                </a>
            </div>


        </div>
    </div>

@endsection
