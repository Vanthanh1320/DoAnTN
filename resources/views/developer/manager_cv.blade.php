@extends('layouts.main')

@section('content')

    <div class="wrap">
        <div class="banner banner-other ">
            <div class="container">

            </div>
        </div>

        <div class="container-lg">
            <div class="cv-manage content-sm px-5 py-4 mb-5">
                <div class="cv-manage-head">
                    <h2>
                        Quản lý CV
                    </h2>

                    <a href="{{route('cv.create')}}" class="btn btn-submit">
                        <i class="fa-solid fa-address-card"></i>
                        Tạo CV mới
                    </a>
                </div>

                <div class="cv-manage-table">
                    <table class="table align-middle">
                        <thead class="table-secondary">
                        <tr>
                            <th>Tên CV</th>
                            <th>Vị trí ứng tuyển</th>
                            <th>Lần chỉnh sửa cuối</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($profiles) > 0)
                            @foreach($profiles as $key => $item)
                                <tr class="align-top">
                                    <td class="text-black">{{$item->title}}</td>
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>
                                        <a target="_blank" href="{{route('print-pdf',[$item->id])}}">PDF</a>
                                        <a href="/">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="{{route('cv.edit',[$item->id])}}" class="mx-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{route('cv.destroy',[$item->id])}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Bạn có muốn xóa')" style="width: 0; border: 0">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="4">
                                    <p>Chưa có CV</p>

                                </td>

                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
