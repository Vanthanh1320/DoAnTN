@extends('layouts.main-employer')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Tin tuyển dụng</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
{{--                            <h5 class="card-title">Basic Datatable</h5>--}}
                            <div class="row">
                                <div class="col-sm-12 col-md-6 justify-content-end">
                                    <a href="{{route('post.create')}}" class="btn btn-info mb-3">
                                        <i class="fas fa-address-card"></i>
                                        Tạo bài tuyển dụng
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    id="zero_config"
                                    class="table table-striped table-bordered"
                                >
                                    <thead>
                                        <tr>
                                            <th class="fw-bold">STT</th>
                                            <th class="fw-bold">Tiêu đề</th>
                                            <th class="fw-bold">Vị trí</th>
                                            <th class="fw-bold">Mức lương</th>
                                            <th class="fw-bold">Ngày đăng</th>
                                            <th class="fw-bold">Trạng thái</th>
                                            <th class="fw-bold">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($post as $key=>$item)
                                            <tr class="align-top">
                                                <td>{{$key+1}}</td>
                                                <td class="text-black">{{$item->title}}</td>
                                                <td>{{$item->position}}</td>
                                                <td>{{$item->salary_min}} - {{$item->salary_max}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                <td>
                                                    @if($item->status === 1)
                                                        <span class="btn btn-success btn-sm text-white">Tin đang đăng</span>
                                                    @else
                                                        <span class="btn btn-danger btn-sm text-white">Tin bị gỡ</span>
                                                    @endif
                                                </td>
                                                <td >
                                                    {{--                                                <a href="/">--}}
                                                    {{--                                                    <i class="fas fa-eye"></i>--}}
                                                    {{--                                                </a>--}}

                                                    <a href="{{route('post.edit',[$item->id])}}" class="btn btn-cyan btn-sm text-white mx-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{route('post.destroy',[$item->id])}}" method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm text-white" onclick="return confirm('Bạn có muốn xóa')" >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tfoot>
                                </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
