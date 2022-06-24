@extends('layouts.main-employer')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Cập nhập tin tuyển dụng</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <form action="{{route('post.update',[$post->id])}}" method="post">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="status" value="1">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Thông tin tuyển dụng</h4>

                                <div class="form-group mt-3">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" name="title" value="{{$post->title}}" class="form-control {{$errors->has('title') ? ' is-invalid' : '' }}">

                                    @if($errors->has('title'))
                                        <span class="text text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Vị trí công việc</label>
                                    <input type="text" name="position" value="{{$post->position}}" class="form-control {{$errors->has('position') ? ' is-invalid' : '' }}" >

                                    @if($errors->has('position'))
                                        <span class="text text-danger">{{$errors->first('position')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 mt-3">Kỹ năng</label>
                                    <select
                                        name="kills[]"
                                        class="select2 form-select shadow-none mt-3"
                                        multiple="multiple"
                                        style="height: 36px; width: 100%"
                                    >
                                        @foreach($array_kills as $item)
                                            <option value="{{$item->name}}" {{in_array($item->name,$kills) ? 'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('kills'))
                                        <span class="text text-danger">{{$errors->first('kills')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 mt-3">
                                        Cấp bậc
                                    </label>
                                    <select class="select2 form-select shadow-none mt-3"
                                            multiple="multiple"
                                            style="height: 36px; width: 100%"
                                            name="level[]">
                                        @foreach($array_level as $item)
                                            <option value="{{$item}}" {{in_array($item,$levels) ? 'selected':''}}>{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('level'))
                                        <span class="text text-danger">{{$errors->first('level')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
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
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                {{--                                <h5 class="card-title mb-0">Form Elements</h5>--}}
                                <div class="form-group">
                                    <label class="form-label">Thời gian làm việc</label>
                                    <select class="form-select" name="position_type">
                                        <option  >Fulltime</option>
                                        <option >Partime</option>
                                        <option >Remote</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Số lượng</label>
                                    <input type="number" name="quantity" value="{{$post->quantity}}" class="form-control {{$errors->has('quantity') ? ' is-invalid' : '' }}" >
                                    @if($errors->has('quantity'))
                                        <span class="text text-danger">{{$errors->first('quantity')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Nơi làm việc</label>
                                    <input type="text" class="form-control {{$errors->has('address_work') ? ' is-invalid' : '' }}" value="{{$post->address_work}}" name="address_work">
                                    @if($errors->has('address_work'))
                                        <span class="text text-danger">{{$errors->first('address_work')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Hạn nộp hồ sơ</label>
                                    <input type="date" name="expire" value="{{$post->expire}}" class="form-control {{$errors->has('expire') ? ' is-invalid' : '' }}" >
                                    @if($errors->has('expire'))
                                        <span class="text text-danger">{{$errors->first('expire')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Mức lương</label>

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

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="card-title">Mô tả chi tiết</h4>

                                    <textarea class="form-control" id="editor_jd" name="job_description">
                                        {{$post->job_description}}
                                    </textarea>
                                    @if($errors->has('job_description'))
                                        <span class="text text-danger">{{$errors->first('job_description')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <h4 class="card-title">Yêu cầu công việc</h4>

                                    <textarea class="form-control" id="editor_jre" name="job_requirements">
                                        {{$post->job_description}}
                                    </textarea>
                                    @if($errors->has('job_requirements'))
                                        <span class="text text-danger">{{$errors->first('job_requirements')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <h4 class="card-title">Chế độ đãi ngộ</h4>

                                    <textarea class="form-control" id="editor_be" name="benefit">
                                        {{$post->benefit}}
                                    </textarea>
                                    @if($errors->has('benefit'))
                                        <span class="text text-danger">{{$errors->first('benefit')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body text-end">
                                    <a href="{{route('post.index')}}"class="btn btn-danger text-white me-2">Hủy</a>

                                    <input type="submit" value="Cập nhập" class="btn btn-success text-white">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection
