@extends('layouts.main-employer')

@section('content')

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
                                                <option >Thời gian</option>
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

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Số lượng hồ sơ ứng tuyển</th>
                                    <th scope="col">Số lượng hồ sơ được duyệt</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($statisticApply as $key=>$item)
                                        <?php
                                            $total_apply=0;
                                            $total_browsing=0;
                                        ?>

                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                @if(isset($item->statistics))
                                                    @foreach($item->statistics as $tt)
                                                        @php $total_apply+=$tt->quantity_apply @endphp
                                                    @endforeach

                                                    {{$total_apply}}
                                                @else

                                                    {{$total_apply}}
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($item->statistics))
                                                    @foreach($item->statistics as $tt)
                                                        @php $total_browsing+=$tt->quantity_browsing @endphp
                                                    @endforeach

                                                    {{$total_browsing}}
                                                @else

                                                    {{$total_browsing}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
