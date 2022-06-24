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

                            @if(isset($_POST['key']))
                                value="{{$_POST['key']}}"
                            @endif
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

    <div class="container-lg">
        <h3 class="fw-bold">Nhà tuyển dụng nổi bật</h3>
        <section id="demos" class="mt-3 mb-4">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="item-img">
                                <img src="{{url('empl/img')}}/neolab-small.png" width="50px"  alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-img">
                                <img src="{{url('empl/img')}}/cmc-small.jpg" width="50px"  alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-img">
                                <img src="{{url('empl/img')}}/mgm-small.png" width="50px"  alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-img">
                                <img src="{{url('empl/img')}}/techzen-small.png" width="50px"  alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-img">
                                <img src="{{url('empl/img')}}/ubisoft-small.png" width="50px"  alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-img">
                                <img src="{{url('empl/img')}}/em&ai-small.png" width="50px"  alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-img">
                                <img src="{{url('empl/img')}}/lvtstart-small.png" width="50px"  alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
