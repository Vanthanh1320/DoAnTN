@extends('layouts.main-employer')

@section('content')

    <div class="employer-main content px-5 py-4 mb-5 show" id="posts">
            <div class="cv-manage-head">
                <h2 class="text-black">
                    Tuyển dụng
                </h2>

                <a href="{{route('post.create')}}" class="btn btn-submit">
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
                    @foreach($post as $key=>$item)
                        <tr class="align-top">
                            <td>{{$key+1}}</td>
                            <td class="text-black">{{$item->title}}</td>
                            <td>{{$item->position}}</td>
                            <td>{{$item->salary_min}} - {{$item->salary_max}}</td>
                            <td>{{\Carbon\Carbon::parse($item->created_at)->isoFormat('DD-MM-YYYY')}}</td>
                            <td>{{$item->status}}</td>
                            <td style="display: inline-block">
                                <a href="/">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{route('post.edit',[$item->id])}}" class="mx-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{route('post.destroy',[$item->id])}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa')" style="width: 0; border: 0">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

@endsection
