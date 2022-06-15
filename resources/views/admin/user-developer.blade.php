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
                        <li class="breadcrumb-item active" aria-current="page">Người tìm việc</li>
                    </ol>
                </nav>
                <h2 class="h4">Tài khoản người tìm việc</h2>
            </div>

        </div>

    </div>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Địa chỉ Email</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            <!-- Item -->
            @foreach($users_developer as $key=>$devloper)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$devloper->name}}</td>
                    <td>{{$devloper->email}}</td>
                    <td>{{$devloper->phone_number}}</td>
                    <td>
{{--                        <div class="can-toggle can-toggle--size-small">--}}
{{--                            <input id="b" type="checkbox"--}}
{{--                                {{$user->status === 1 ? 'checked' :''}}--}}
{{--                            />--}}
{{--                            <label for="b">--}}
{{--                                <div--}}
{{--                                    class="can-toggle__switch"--}}
{{--                                    data-checked="On"--}}
{{--                                    data-unchecked="Off"--}}
{{--                                    {{$user->status === 1 ? 'checked' :''}}--}}

{{--                                ></div>--}}

{{--                            </label>--}}
{{--                        </div>--}}

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="{{$devloper->id}}" {{$devloper->status === 1 ? 'checked' :''}} id="flexSwitchCheckDefault">
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-center">
            {!! $users_developer->links() !!}

        </div>
    </div>


@endsection
