@extends('layouts.main')

@section('content')

    <div class="wrap">
        <div class="banner banner-home">
            <div class="container">
                <div class="search my-4">
                    <form action="{{route('search')}}" method="post" class="search__form" autocomplete="off">
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

        <div class="container-lg">

            <div class="content my-4">
                <div class="posts px-3 py-3">
                    <div class="posts-count">
                        <h3 class="posts-number">
                            <span>{{count($posts)}}</span>
                            Việc làm IT
                        </h3>
                    </div>

                    <div class="row g-2">
                        @foreach($posts as $item)
                        <div class="col-sm-12 col-md-12 col-xl-6">
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
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
