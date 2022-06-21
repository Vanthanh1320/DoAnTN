@extends('layouts.main-employer')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Ứng viên</h4>
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
                                <div class="col-sm-12 col-md-12 justify-content-end text-end mb-3">
                                    <div class="col-md-9">

                                    </div>
                                    <form action="{{route('export-excel')}}" method="post" class="d-flex justify-content-end">
                                        @csrf
                                        <select
                                            name="status"
                                            class="form-select select-status shadow-none me-3"
                                            style="width: 150px; height: 36px"
                                        >
                                            <option value="2">Tất cả</option>
                                            <option value="1">Đã duyệt</option>
                                            <option value="0">Chưa duyệt</option>
                                        </select>

                                        <input type="submit" class="btn btn-success text-white " value="Dowload Excel">
                                    </form>
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
                                        <th class="fw-bold">Tin tuyển dụng</th>
                                        <th class="fw-bold">Họ tên</th>
                                        <th class="fw-bold">Email</th>
                                        <th class="fw-bold">Số điện thoại</th>
                                        <th class="fw-bold">Link hồ sơ</th>
                                        <th class="fw-bold">Ngày ứng tuyển</th>
                                        <th class="fw-bold">Trạng thái</th>
                                        <th class="fw-bold">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(!isset($cadidates))
                                            @foreach($candidates as $key=>$item)
                                                <tr class=" align-top text-center">
                                                    <td >{{$key+1}}</td>
                                                    <td >{{$item->recruitment->title}}</td>
                                                    <td class="text-black">{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->phone_number}}</td>
                                                    <td><a href="{{url('pdf-cv').'/'.$item->linkCV}}" target="_blank">{{$item->linkCV}}</a></td>
                                                    <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                    <td>
                                                        <span class="{{$item->status ==1 ? 'badge bg-success' : 'badge bg-secondary'}}">
                                                            {{$item->status == 1?'Đã duyệt':'Chưa duyệt'}}
                                                        </span>
                                                    </td>
                                                    <td class="d-flex align-items-start" style="height: 80px;">

                                                        <form action="{{route('delete-candidate',[$item->id])}}" method="post" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm text-white" onclick="return confirm('Bạn có muốn xóa')" >
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                        <div class="form-check form-switch mx-2">
                                                            <input class="form-check-input text-center status-apply"  {{$item->status == 1?'checked':''}} data-id="{{$item->id}}" data-set="{{$item->user_id}}" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        </div>

{{--                                                        <input id="sendMail" onclick="sendMail({{$item->user_id}},{{$item->recruitment_id}})" data-id="{{$item->user_id}}" type="submit" value="Gửi Mail"/>--}}
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @endif
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
