@extends('admin.layouts.main')

@section('content')
    <div class="py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Đăng thông báo</li>
                    </ol>
                </nav>
                <h2 class="h4">Đăng thông báo</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <div class="row mb-4">
                        <form action="{{route('create-notice')}}" method="post">
                            @csrf
                            <div class="col-lg-12 col-sm-6">
{{--                                <input type="hidden" name="image" value="logo-white.png">--}}
                                <div class="mb-4 row">
                                    <label for="staticEmail" class="col-sm-3">Tên thông báo</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="staticEmail" class="col-sm-3">Nội dung</label>
                                    <div class="col-sm-9">
                                        <textarea name="contents" id="contents" cols="30" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="staticEmail" class="col-sm-3">Đối tượng</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="users" name="account_type" aria-label="Default select example">
                                            <option selected>Chọn đối tượng</option>
                                            <option value="2">Người tìm việc</option>
                                            <option value="3">Nhà tuyển dụng</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button class="btn btn-success" id="notifyTopLeft">Tạo</button>
                                    <button class="btn btn-danger">Hủy</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
