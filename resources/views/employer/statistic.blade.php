@extends('layouts.main-employer')

@section('content')

{{--    <div class="content px-5 py-4 mb-5" id="statiscal" >--}}
{{--            <div class="cv-manage-head">--}}
{{--                <form action="" class="d-flex">--}}
{{--                    @csrf--}}
{{--                    <select class="form-select form-select-posts me-2" aria-label=".form-select-lg example">--}}
{{--                        <option selected>Chọn tin</option>--}}
{{--                        @foreach($posts as $post)--}}
{{--                            <option value="{{$post->id}}">{{$post->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--    </div>--}}

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Thống kê</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3 mt-3">Chọn tin</label>
                                        <div class="col-md-6">
                                            <select
                                                class="select2 form-select shadow-none"
                                                style="width: 100%; height: 36px"
                                            >
                                                <option>Chọn tin</option>
                                                @foreach($posts as $post)
                                                    <option value="{{$post->id}}">{{$post->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group row justify-content-end align-items-center">
                                        <label class="col-md-3 mt-3">Lọc theo </label>
                                        <div class="col-md-4">
                                            <select
                                                class="select2 form-select form-select-filter shadow-none"
                                                style="width: 100%; height: 36px"
                                            >
                                                <option value="ngayhomqua">ngày hôm qua</option>
                                                <option value="7ngayqua">7 ngày qua</option>
                                                <option value="thangtruoc">tháng trước</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center font-bold text-uppercase">Thống kê số lượng hồ sơ của ứng viên</h5>
                            <div class="loadchart">
                                <div id="myfirstchart" style="height: 250px;"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
