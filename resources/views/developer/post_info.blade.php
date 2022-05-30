@extends('layouts.main')

@section('content')
    <div id="toast">

    </div>
    <div class="wrap">
        <div class="banner banner-other ">
            <div class="container">
            </div>
        </div>

        <div class="container-lg my-4">
            <div class="row g-4">
                <div class="col-sm-12 col-md-12 col-xl-8 ">
                    <div class="detail-job content py-4 px-sm-4 px-md-5">
                        <div class="detail-job-head">
                            <h2 class="detail-job-title">
                                {{$post->title}}
                            </h2>

                            <input type="hidden" name="title" value="{{$post->title}}">
                            <input type="hidden" name="slug" value="{{$post->slug_title}}">
                            <input type="hidden" name="image" value="{{$post->user->image}}">
                            <input type="hidden" name="company" value="{{$post->user->company}}">
                            <input type="hidden" name="address_work" value="{{$post->address_work}}">
                            <input type="hidden" name="salary_min" value="{{$post->salary_min}}">
                            <input type="hidden" name="salary_max" value="{{$post->salary_max}}">
                            <input type="hidden" name="kills" value="{{$post->kills}}">
                            <input type="hidden" name="time" value="{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}">


                            <span type="button" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Lưu">
                              <i class="fa-regular fa-bookmark" id="save" data-set="{{$post->id}}" onclick="savePost({{$post->id}})"></i>
                            </span>
                        </div>

                        <div class="detail-job-link">
                            @if($post->expire < \Carbon\Carbon::now()->toDateString())
                                <span class="btn btn-light "> Đã hết hạn ứng tuyển </span>
                            @elseif(!isset($apply))
                                <a
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    class="btn btn-submit">
                                    Ứng Tuyển
                                </a>

                                <p>hoặc</p>

                                <a href="{{route('cv.create')}}" class="btn btn-light ">
                                    Tạo CV để ứng tuyển
                                </a>
                            @else
                                <span class="btn btn-light "> Đã ứng tuyển </span>
                            @endif
                        </div>
                        <hr />

                        <div class="posts-item-info__kills">
                            @foreach($kills as $item)
                                <span>{{$item}}</span>
                            @endforeach

                        </div>

                        <div class="posts-item-info__salary">
                            <p>
                                <i class="fa-solid fa-money-bill-wave"></i>
                                {{$post->salary_min}} - {{$post->salary_max}}
                            </p>
                        </div>
                        <div class="posts-item-info__address">
                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                {{$post->address_work}}
                            </p>
                        </div>

                        <div class="posts-item-timer">
                            <p>
                                <i class="fa-solid fa-calendar-days"></i>
                                {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                            </p>
                        </div>
                        <hr />

                        <div class="detail-job-jobs">
                            <h3>Mô tả công việc</h3>
                            <p>
                                {!! html_entity_decode($post->job_description) !!}
                            </p>

                            <h3>Yêu cầu công việc</h3>
                            <p>
                                {!! html_entity_decode($post->job_requirements) !!}
                            </p>

                            <h3>Chế độ đãi ngộ</h3>
                            <p>
                                {!! html_entity_decode($post->benefit) !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-0 col-md-0 col-xl-4 ">
                    <div class="detail-company content py-4 px-5">
                        <div class="detail-company-top">
                            <img src="{{url('empl/img').'/'.$post->user->image}}" alt="logo" />
                            <h2>{{$post->user->company}}</h2>
                        </div>

                        <div class="detail-company-main py-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="detail-company-main-setting">
                                            <p><i class="fa-solid fa-gear"></i>Dịch vụ</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="detail-company-main-people">
                                            <p><i class="fa-solid fa-users"></i>100</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="detail-company-main-web">
                                            <p>
                                                <i class="fa-solid fa-link"></i>
                                                <a href="/">
                                                    {{$post->user->website}}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-xl-8">
                    <div class="jobs-other content py-4 px-sm-4 px-md-5">
                        <h2 class="detail-job-title mb-4">Việc làm phù hợp dành cho bạn</h2>

                        @foreach($posts_same as $item)
                            <a class="posts-item py-3 px-3" href="{{route('show-post-info',[$item->slug_title])}}">
                                <div class="posts-item-img">
                                    <img src="{{url('empl/img').'/'.$item->user->image}}" alt="logo-company">
                                </div>

                                <div class="posts-item-info px-sm-2 ms-3 me-auto">
                                    <h2 class="posts-item-info__title">{{$item->title}}</h2>
                                    <p class="posts-item-info__company">{{$item->user->company}}</p>
                                    <div class="posts-item-info__address">
                                        <p>
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{$item->address_work}}
                                        </p>
                                    </div>
                                    <div class="posts-item-info__salary">
                                        <p>
                                            <i class="fa-solid fa-money-bill-wave"></i>
                                            {{$item->salary_min}} - {{$item->salary_max}}
                                        </p>
                                    </div>
                                    <div class="posts-item-info__kills">

                                        @foreach(Str::of($item->kills)->explode(',') as $kill)
                                            <span>{{$kill}}</span>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="posts-item-timer">
                                    <p>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p>
                                </div>
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('apply')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="apply content-sm px-4 py-3">
                            <h3 class="apply-title mb-4 fw-bold">
                                {{$post->title}}
                            </h3>

                            <input type="hidden" name="recruitment_id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id : ''}}">
                            <input type="hidden" name="status" value="0">

                            <div class="mb-4">
                                <label for="" class="form-label fw-bold">Họ tên <span>*</span></label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()? Auth::user()->name : ''}}"/>
                                @if($errors->has('name'))
                                    <span class="text text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="" class="form-label fw-bold">Email <span>*</span></label>
                                <input type="email" class="form-control" name="email" value="{{Auth::user() ? Auth::user()->email: ''}}"/>
                                @if($errors->has('email'))
                                    <span class="text text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="" class="form-label fw-bold">Số điện thoại <span>*</span></label>
                                <input type="text" class="form-control" name="phone_number" />
                                @if($errors->has('phone_number'))
                                    <span class="text text-danger">{{$errors->first('phone_number')}}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="" class="form-label fw-bold">Tải hồ sơ:</label>

                                <div class="detail-select-upload mb-2">
                                    <button class="select-tab pb-1 active-tab" data-id="profile">
                                        Hồ sơ của bạn
                                    </button>
                                    <button class="select-tab pb-1 ms-3" data-id="upload">
                                        Tải lên hồ sơ mới
                                    </button>
                                </div>

                                <div class="detail-files-upload active-tab" id="profile">

                                    @if(isset($profiles))
                                        @foreach($profiles as $key=>$item)
                                            <div class="form-check">
                                                <input class="form-check-input" value="{{($item->title.'.pdf')}}" type="radio" name="document" {{$key == 0?'checked':''}} id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    <a target="_blank" href="{{route('print-pdf',[$item->id])}}">
                                                        {{$item->title}}
                                                    </a>
                                                </label>
                                            </div>
                                        @endforeach
                                    @else
                                        <a href="{{route('login')}}">Đăng nhập để sử dụng cv đã được áp dụng</a>
                                    @endif

                                </div>

                                <div class="detail-files-upload" id="upload">
                                    <input type="file" name="file" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>

                        <input
                            class="btn btn-submit px-4"
                            type="submit"
                            value="Ứng tuyển"
                        />
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
