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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="">
                    <div class="modal-body">
                        <div class="apply content-sm px-3 py-3">
                            <h2 class="apply-title mb-4">
                                Frontend Dev (Vue.js/ React) - Romove
                            </h2>

                            <div class="mb-4 row">
                                <label for="" class="col-sm-2 col-form-label">Họ tên:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" />
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="" class="col-sm-2 col-form-label">CV:</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="" />
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label"
                                >Giới thiệu bản thân, kỹ năng, dự án,...</label
                                >
                                <textarea
                                    name="mota"
                                    id=""
                                    class="form-control"
                                    cols="30"
                                    rows="5"
                                ></textarea>
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
