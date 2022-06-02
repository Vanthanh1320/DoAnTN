@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin')}}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('show-user-employer')}}">Nhà tuyển dụng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$user->company}}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <h2 class="h5 mb-4">Thông tin nhà tuyển dụng</h2>
                    <div class="row mb-4">
                        <div class="col-lg-8 col-sm-6">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6">Ảnh</label>
                                <div class="col-sm-6">
                                    <img src="{{url('empl/img').'/'.$user->image}}" class="rounded avatar-xl" alt="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 ">Tên công ty</label>
                                <div class="col-sm-6">
                                    <p class="small pe-4">{{$user->company}}</p>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 ">Người đại diện</label>
                                <div class="col-sm-6">
                                    <p class="small pe-4">{{$user->name}}</p>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 ">Địa chỉ email</label>
                                <div class="col-sm-6">
                                    <p class="small pe-4">{{$user->email}}</p>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 ">Địa chỉ</label>
                                <div class="col-sm-6">
                                    <p class="small pe-4">{{$user->address}}</p>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Số điện thoại</label>
                                <div class="col-sm-6">
                                    <p class="small pe-4">{{$user->phone_number}}</p>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-6 col-form-label">Website công ty</label>
                                <div class="col-sm-6">
                                    <p class="small pe-4">{{$user->website}}</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
