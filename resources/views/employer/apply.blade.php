@extends('layouts.main-employer')

@section('content')

{{--    <div class=" content px-5 py-4 mb-5" id="cabdidates">--}}
{{--        <div class="cv-manage-head">--}}
{{--            <div class="d-flex">--}}
{{--                <input type="text" placeholder="Tìm kiếm" name="keyword" class="form-control search-key me-2">--}}

{{--                <select class="form-select me-2" aria-label=".form-select-lg example">--}}
{{--                    <option value="2" >Trạng thái</option>--}}
{{--                    <option value="1">Duyệt</option>--}}
{{--                    <option value="0">Chưa duyệt</option>--}}
{{--                </select>--}}

{{--                <button class="btn btn-submit" class="btn btn-submit ">--}}
{{--                    <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <form action="{{route('export-excel')}}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="submit" class="btn btn-success w-100" value="Dowload Excel">--}}
{{--            </form>--}}

{{--        </div>--}}

{{--        <div class="cv-manage-table">--}}
{{--            <table class="table align-middle">--}}
{{--                <thead class="table-secondary">--}}
{{--                <tr class="text-center">--}}
{{--                    <th>STT</th>--}}
{{--                    <th>Tin tuyển dụng</th>--}}
{{--                    <th>Họ tên</th>--}}
{{--                    <th>Email</th>--}}
{{--                    <th>Số điện thoại</th>--}}
{{--                    <th>Link CV</th>--}}
{{--                    <th>Ngày ứng tuyển</th>--}}
{{--                    <th>Trạng thái</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody class="candidate">--}}
{{--                @if(count($candidates) >0)--}}
{{--                    @foreach($candidates as $key=>$item)--}}
{{--                        <tr class=" align-top text-center">--}}
{{--                            <td >{{$key+1}}</td>--}}
{{--                            <td >{{$item->recruitment->title}}</td>--}}
{{--                            <td class="text-black">{{$item->name}}</td>--}}
{{--                            <td>{{$item->email}}</td>--}}
{{--                            <td>{{$item->phone_number}}</td>--}}
{{--                            <td><a href="{{url('pdf-cv').'/'.$item->linkCV}}" target="_blank">{{$item->linkCV}}</a></td>--}}
{{--                            <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('DD-MM-YYYY')}}</td>--}}
{{--                            <td>--}}
{{--                                <div class="form-check form-switch ">--}}
{{--                                    <input class="form-check-input text-center"  {{$item->status == 1?'checked':''}} data-id="{{$item->id}}" data-set="{{$item->user_id}}" type="checkbox" role="switch" id="flexSwitchCheckDefault">--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

{{--                    @endforeach--}}
{{--                @endif--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}

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
                                    <form action="{{route('export-excel')}}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-success text-white" value="Dowload Excel">
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
                                        <th class="fw-bold">Link CV</th>
                                        <th class="fw-bold">Ngày ứng tuyển</th>
                                        <th class="fw-bold">Trạng thái</th>
                                        <th class="fw-bold">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($candidates) >0)
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
                                                        <div class="form-check form-switch ">
                                                            <input class="form-check-input text-center"  {{$item->status == 1?'checked':''}} data-id="{{$item->id}}" data-set="{{$item->user_id}}" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form action="{{route('delete-candidate',[$item->id])}}" method="post" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm text-white" onclick="return confirm('Bạn có muốn xóa')" >
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
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
