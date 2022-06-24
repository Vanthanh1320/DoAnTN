<div class="container-lg">

    <div class="content my-4">
        <div class="posts px-3 py-3">
            <div class="posts-count">
                <h3 class="posts-number">
                    <span>{{$posts->total()}}</span>
                    Việc làm IT
                </h3>
            </div>
{{--            <a href="{{route('testMailAuto')}}">Test</a>--}}

            <div class="row g-2">
                @foreach($posts as $item)
                    <div class="col-sm-12 col-md-12 col-xl-6 m-0">
                        <a class="posts-item py-3 px-3" href="{{route('show-post-info',[$item->slug_title])}}">
                            <div class="posts-item-img">
                                <img src="{{url('empl/img').'/'.$item->user->image}}" alt="logo-company">
                            </div>

                            <div class="posts-item-info px-sm-2 ms-3 me-auto">
                                <h2 class="posts-item-info__title">{{$item->title}}</h2>
                                <p class="posts-item-info__company">{{$item->user->company}}</p>

                                <div class="posts-item-info__salary">
                                    <p>
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        {{Str::replace('000000','',$item->salary_min)}}
                                            -
                                        {{ Str::replace('000000','',$item->salary_max) }} triệu
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

        {!! $posts->links() !!}

    </div>

</div>
