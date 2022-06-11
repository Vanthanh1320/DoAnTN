@extends('layouts.main')

@section('content')

<div class="wrap">
    <div class="banner banner-home">
        <div class="container">
            <div class="search my-4">
                <form action="{{route('search')}}" method="post" class="search__form" autocomplete="off" m>
                    @csrf
                    @method('POST')
                    <div class="search__form-input">
                        <div class="search-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input
                            name="key"
                            type="text"
                            class="form-control"
                            id="key"
                            placeholder="Nhập theo kỹ năng, chức vụ, công ty..."
                        />
                    </div>
                    <div class="form__suggess"></div>

                    <div class="search__form-select mx-1">
                        <select class="form-select" name="level">
                            <option>Chọn cấp bậc</option>
                            <option value="Intern">Intern</option>
                            <option value="Fresher">Fresher</option>
                            <option value="Junior">Junior</option>
                            <option value="Senior">Senior</option>
                            <option value="Leader Developer">Leader Developer</option>
                            <option value="Mid-level Manager">Mid-level Manager</option>
                            <option value="Senior Leader">Senior Leader</option>
                        </select>
                    </div>
                    <button class="btn search__form-btn btn-submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>

    <div class="post-data">
{{--        <a href="{{route('testMailAuto')}}">Test Mail</a>--}}
        @include('developer.posts-more')
    </div>
</div>
@endsection
