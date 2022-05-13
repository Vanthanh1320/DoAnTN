@extends('layouts.main')

@section('content')

    <div class="container my-4">
        <form action="{{route('post.update',[$post->id])}}" method="post">
            @csrf
            @method('PUT')

            @if(session('errors'))
                {{session('errors')}}
            @endif


{{--            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
{{--            <input type="hidden" name="status" value="1">--}}

            <div class="content-sm px-5 py-4 mb-5">
                <div class="header-post col-12 py-3 mb-3">
                    <p class="m-0 ps-3">Thông tin tuyển dụng</p>
                </div>

                <div class="mb-3 mx-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control {{$errors->has('title') ? ' is-invalid' : '' }}">

                    @if($errors->has('title'))
                        <span class="text text-danger">{{$errors->first('title')}}</span>
                    @endif
                </div>

                <div class="row mx-1">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Vị trí công việc</label>
                            <input type="text" name="position" value="{{$post->position}}" class="form-control {{$errors->has('position') ? ' is-invalid' : '' }}" >
                            @if($errors->has('position'))
                                <span class="text text-danger">{{$errors->first('position')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Thời gian làm việc</label>
                            <select class="form-select" name="position_type">
                                <option {{$post->position_type == 'Fulltime' ? 'selected':''}}>Fulltime</option>
                                <option {{$post->position_type == 'Partime' ? 'selected':''}}>Partime</option>
                                <option {{$post->position_type == 'Remote' ? 'selected':''}}>Remote</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mx-1">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">
                                Cấp bậc
                                <input mbsc-input class="form-control" id="my-input2" data-dropdown="true" data-tags="true" />
                            </label>
                            <select id="multiple-select2" class="form-control" multiple name="level[]">
                                @foreach($array_level as $item)
                                    <option value="{{$item}}" {{in_array($item,$levels) ? 'selected':''}}>{{$item}}</option>
                                @endforeach

                            </select>
                            @if($errors->has('level'))
                                <span class="text text-danger">{{$errors->first('level')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">
                                Kỹ năng
                                <input mbsc-input class="form-control" id="my-input" data-dropdown="true" data-tags="true" />
                            </label>
                            <select id="multiple-select" multiple name="kills[]">
                                @foreach($array_kills as $item)
                                    <option value="{{$item}}" {{in_array($item,$kills) ? 'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('kills'))
                                <span class="text text-danger">{{$errors->first('kills')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mx-1">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Kinh nghiêm</label>
                            <select class="form-select" name="experience">
                                <option selected>Chưa có kinh nghiệm</option>
                                <option value="1">Dưới 1 năm</option>
                                <option value="2">1</option>
                                <option value="3">2</option>
                                <option value="3">3</option>
                                <option value="3">4</option>
                                <option value="3">5</option>
                                <option value="3">Trên 5 năm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Số lượng</label>
                            <input type="number" name="quantity" value="{{$post->quantity}}" class="form-control {{$errors->has('quantity') ? ' is-invalid' : '' }}" >
                            @if($errors->has('quantity'))
                                <span class="text text-danger">{{$errors->first('quantity')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mx-1">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Hạn nộp hồ sơ</label>
                            <input type="date" name="expire" value="{{$post->expire}}" class="form-control {{$errors->has('expire') ? ' is-invalid' : '' }}" >
                            @if($errors->has('expire'))
                                <span class="text text-danger">{{$errors->first('expire')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Nơi làm việc</label>
                            <input type="text" class="form-control {{$errors->has('address_work') ? ' is-invalid' : '' }}" value="{{$post->address_work}}" name="address_work">
                            @if($errors->has('address_work'))
                                <span class="text text-danger">{{$errors->first('address_work')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="header-post col-12 py-3 my-4">
                    <p class="m-0 ps-3">Mức lương</p>
                </div>

                <div class="mb-3 mx-3">
                    <div class="row">
                        <div class="col-2 d-flex flex-column justify-content-center">
                            <div class="badge bg-secondary py-3 px-3 mt-3">VND</div>
                        </div>
                        <div class="col-5">
                            <label class="form-label" >Tối thiểu</label>
                            <input type="string" class="form-control {{$errors->has('salary_min') ? ' is-invalid' : '' }}" value="{{$post->salary_min}}" name="salary_min" placeholder="0.0" >
                            @if($errors->has('salary_min'))
                                <span class="text text-danger">{{$errors->first('salary_min')}}</span>
                            @endif
                        </div>
                        <div class="col-5">
                            <label class="form-label" >Tối đa</label>
                            <input type="string" class="form-control {{$errors->has('salary_max') ? ' is-invalid' : '' }}" value="{{$post->salary_max}}" name="salary_max" placeholder="0.0" >
                            @if($errors->has('salary_max'))
                                <span class="text text-danger">{{$errors->first('salary_max')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="header-post col-12 py-3 my-4">
                    <p class="m-0 ps-3">Mô tả chi tiết</p>
                </div>

                <div class="mb-3 mx-3">
                    <label class="form-label">Mô tả công việc</label>
                    <textarea class="form-control" id="editor_jd" name="job_description">
                        {{$post->job_description}}
                    </textarea>
                    @if($errors->has('job_description'))
                        <span class="text text-danger">{{$errors->first('job_description')}}</span>
                    @endif
                </div>
                <div class="mb-3 mx-3">
                    <label class="form-label">Yêu cầu công việc</label>
                    <textarea class="form-control" id="editor_jre" name="job_requirements">
                        {{$post->job_requirements}}
                    </textarea>
                    @if($errors->has('job_requirements'))
                        <span class="text text-danger">{{$errors->first('job_requirements')}}</span>
                    @endif
                </div>
                <div class="mb-3 mx-3">
                    <label class="form-label">Chế độ đãi ngộ</label>
                    <textarea class="form-control" id="editor_be" name="benefit">
                        {{$post->benefit}}
                    </textarea>
                    @if($errors->has('benefit'))
                        <span class="text text-danger">{{$errors->first('benefit')}}</span>
                    @endif
                </div>

                <div class="mx-3 text-end">
                    <input type="submit" value="Hủy" class="btn btn-secondary me-2">

                    <input type="submit" value="Tạo" class="btn btn-submit">
                </div>
            </div>
        </form>

    </div>
@endsection
