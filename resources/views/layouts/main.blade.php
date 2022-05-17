<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=`, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IT-DaNang</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />
    <script
        src="https://kit.fontawesome.com/98ddc7f134.js"
        crossorigin="anonymous"
    ></script>

{{--    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"
            integrity="sha512-bGYUkjDyyOMGm3ASzq3zRaWZ4CONNH1wAYMFch/Z0ASZrsg722SeRsX0FPPRZjTuJrqIMbB9fvY0LEMzyHeyeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <link href="{{url("users")}}/css/mobiscroll.javascript.min.css" rel="stylesheet" />
    <script src="{{url("users")}}/js/mobiscroll.javascript.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url("users")}}/sass/main.css"/>
</head>
<body data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" tabindex="0">

@if(Str::contains(url()->current(),['login','register']))
    <div class="header header-nofix">
        <div class="header__wrap container">
            <div class="header__logo">
                <a href="/">
                    <img src="{{url('users')}}/img/logo-white.png" alt="logo" class="logo"/>
                </a>
            </div>
            <div class="header__nav">
                <ul class="header__nav-list ms-4">
                    <li class="header__nav-item"><a href="">Tìm việc</a></li>
                    <li class="header__nav-item"><a href="{{route('cv.index')}}">Tạo CV</a></li>
                </ul>

                <ul class="header__nav-list ms-auto">
                    <li class="header__nav-item"><a target="_blank" href="{{url('empl/')}}">Nhà tuyển dụng</a></li>
                </ul>
            </div>
        </div>
    </div>
@elseif(Str::contains(url()->current(),'empl'))
    <div class="header header-nofix">
        <div class="header__wrap container">
            <div class="header__logo">
                <a href="{{route('empl')}}">
                    <img src="{{url('users')}}/img/logo-white.png" alt="logo" class="logo"/>
                </a>
            </div>
            <div class="header__nav">
                <ul class="header__nav-list ms-4">
                    <li class="header__nav-item"><a class="tab-btn show " href="employer#/posts" data-id="posts">Tuyển dụng</a>
                    </li>
                    <li class="header__nav-item"><a class="tab-btn" href="employer#/candidate" data-id="cabdidates">Ứng viên</a>
                    </li>
                    <li class="header__nav-item"><a class="tab-btn" href="employer#/statistic" data-id="statiscal">Thống kê</a>
                    </li>
                </ul>

                <ul class="header__nav-list ms-auto">
                    <li class="header__nav-item header__nav-user">
                        <i class="fa-solid fa-circle-user"></i>
                        <span class="header__nav-user-name">{{Auth::user()->company}}</span>

                        <ul class="header__nav-user-dropdown">
                            <li class="header__nav-user-item ">
                                <a href="{{route('show-account-epl')}}" class="px-3 py-2">
                                    <i class="fa-solid fa-user mr-2"></i>
                                    Tài khoản
                                </a>
                            </li>
                            <li class="header__nav-user-item ">
                                <a href="/" class="px-3 py-2">
                                    <i class="fa-solid fa-heart mr-2"></i>
                                    Việc đã lưu
                                </a>
                            </li>
                            <li class="header__nav-user-item ">
                                <a href="{{ route('logout-emp') }}" class="px-3 py-2">
                                    <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                    Đăng xuất
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@else
    <div class="header ">
        <div class="header__wrap container">
            <div class="header__logo">
                <a href="/">
                    <img src="{{url('users')}}/img/logo-white.png" alt="logo" class="logo"/>
                </a>
            </div>

            <div class="header__nav">
                <ul class="header__nav-list ms-4">
                    <li class="header__nav-item"><a href="/">Tìm việc</a></li>
                    <li class="header__nav-item"><a href="{{route('cv.index')}}">Tạo CV</a></li>
                </ul>

                @if(Str::contains(url()->current(),['tim-viec','tim-kiem']))
                    <div class="search-nav align-items-start mx-auto">
                        <form action="{{route('search')}}" method="post" class="search__form" autocomplete="off">
                            @csrf
                            @method('post')
                            <div class="search__form-input">
                                <input
                                    name="key"
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="Nhập theo kỹ năng, chức vụ, công ty..."
                                    required
                                />
                            </div>
                            <div class="form__suggess" style="top: 66px !important; width: 340px"></div>

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
                            <button class="btn search__form-btn btn-submit ">
                                <div class="search-icon">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </button>
                        </form>

                    </div>
                @endif
                <ul class="header__nav-list ms-auto">
                    @guest()
                        @if(Route::has('login') || Route::has('register'))
                            <li class="header__nav-item"><a href="{{ route('login') }}">Đăng nhập</a></li>
                            <li class="header__nav-item">|</li>
                            <li class="header__nav-item"><a target="_blank" href="{{route('show-login-emp')}}">Nhà
                                    tuyển dụng</a></li>
                        @endif
                    @else
                        <li class="header__nav-item header__nav-user">
                            <i class="fa-solid fa-circle-user"></i>
                            <span class="header__nav-user-name">{{Auth::user()->name}}</span>
                            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">

                            <ul class="header__nav-user-dropdown">
                                <li class="header__nav-user-item ">
                                    <a href="{{route('show-account')}}" class="px-3 py-2">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Tài khoản
                                    </a>
                                </li>
                                <li class="header__nav-user-item ">
                                    <a href="{{route('save-post')}}" class="px-3 py-2">
                                        <i class="fa-solid fa-heart mr-2"></i>
                                        Việc đã lưu
                                    </a>
                                </li>
                                <li class="header__nav-user-item ">
                                    <a href="{{ route('logout') }}" class="px-3 py-2"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest

                </ul>
            </div>

            <div class="header__menu">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                        aria-controls="offcanvasTop">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop"
                     aria-labelledby="offcanvasTopLabel">
                    <div class="search-tablet d-flex justify-content-center p-2">
                        <button type="button" class="btn-close text-reset align-self-end pe-3"
                                data-bs-dismiss="offcanvas" aria-label="Close"></button>

                        <form action="{{route('search')}}" method="get" class="search__form mx-auto">
                            @csrf
                            @method('post')
                            <div class="search__form-input">
                                <div class="search-icon">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <input
                                    name="key"
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="Nhập theo kỹ năng, chức vụ, công ty..."
                                    required
                                />
                            </div>
                            <div class="form__suggess"></div>

                            <div class="search__form-select mx-1">
                                <select class="form-select">
                                    <option selected>Chọn cấp bậc</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <button class="btn search__form-btn btn-submit">Tìm kiếm</button>
                        </form>

                    </div>
                </div>

                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                     aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header justify-content-end">
                        <button type="button" class="btn-close text-reset " data-bs-dismiss="offcanvas"
                                aria-label="Close">

                        </button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="header__menu-list">
                            <li class="header__menu-item">
                                <a href="">Tìm việc</a>
                            </li>
                            <li class="header__menu-item">
                                <a href="">Tạo CV</a>
                            </li>
                            <!-- <li class="header__menu-item">
                              <a href=""></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif



@yield('content')


    @if(!Str::contains(url()->current(),['employer']))
        <div class="footer">
            <div class="footer__wrap container-fluid py-4">
                <p class="footer-text">Copyright &copy; IT DaNang</p>
                <div class="footer__social">
                    <a
                        href="https://www.facebook.com/profile.php?id=100008386385400"
                        class="footer__social-link"
                        target="_blank"
                    >
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://github.com/Vanthanh1320" class="footer__social-link">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a
                        href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"
                        class="footer__social-link"
                    >
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif
</body>

<script src="{{url('users')}}/js/app.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{--toast--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- Ck-editor --}}
<script>
    // CKEDITOR.replace('editor');

    if (location.href.includes('post')){
        CKEDITOR.replace('editor_jd');
        CKEDITOR.replace('editor_jre');
        CKEDITOR.replace('editor_be');
    }

    if(location.href.includes('cv')){
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor_exp1');
        CKEDITOR.replace('editor_pro1');
    }

    $(document).ready(function() {
        toastr.options.timeOut = 4000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        //kinh nghiệm
        $(document).on('click', '.experience-add', function () {
            var i=1;

            var li = `
                     <li>
                        <hr class="my-5">


                        <div class="mb-5 row">
                            <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tên công ty <span class=" red-cl">(*)</span></label>
                            <div class="col-sm-7 col-md-7 col-xl-5">
                                <input type="text" class="form-control" name="name_company[]" id="">
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thời gian làm việc <span class=" red-cl">(*)</span></label>
                            <div class="col-sm-3 col-md-3 ">
                                <input type="date" class="form-control" name="start_time[]" >
                            </div>
                            <div class="col-sm-3 col-md-3 ">
                                 <input type="date" class="form-control" name="end_time[]" >
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Vị trí công việc <span class=" red-cl">(*)</span></label>
                            <div class="col-sm-7 col-md-7 col-xl-5">
                                <input type="text" class="form-control" name="job_position[]">
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Chi tiết công việc </label>
                            <div class="col-sm-7 col-md-7 col-xl-8">
                                <textarea id="editor_exp${++i}"  class="form-control" name="job_details[]" id="" cols="50" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="cv-experience-remove col-sm-2 text-end top-0 pt-5">
                            <span class="btn btn-danger experience-remove" >Xóa</span>
                        </div>
            </li>
              `;


            $('.cv-experience-list').append(li);

            // var editor='editor_exp'+ i;
            // console.log(editor)
            // console.log(i)
            //
            // CKEDITOR.replace(editor);

        });

        $(document).on('click', '.experience-remove', function () {
            $(this).closest('.cv-experience-list > li').remove();
        })

        //học vấn
        $(document).on('click', '.education-add', function () {
            var li = `
                    <li>
                      <hr class="my-5">

                       <div class="mb-5 row">
                            <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tên trường cơ sở đào tạo <span class=" red-cl">(*)</span></label>
                             <div class="col-sm-7 col-md-7 col-xl-5">
                              <input type="text" class="form-control" name="name_school[]" >
                             </div>
                       </div>
                       <div class="mb-5 row">
                            <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thời gian học <span class=" red-cl">(*)</span></label>

                             <div class="col-sm-3 col-md-3 ">
                                <input type="date" class="form-control" name="start_year[]" >
                            </div>
                            <div class="col-sm-3 col-md-3 ">
                                 <input type="date" class="form-control" name="end_year[]" >
                            </div>
                       </div>
                       <div class="mb-5 row">
                           <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Ngành học <span class=" red-cl">(*)</span></label>
                            <div class="col-sm-7 col-md-7 col-xl-5">
                                  <input type="text" class="form-control" name="degree[]" >
                             </div>
                        </div>

                         <div class="cv-experience-remove col-sm-2 text-end top-0 pt-5">
                             <span class="btn btn-danger education-remove" >Xóa</span>
                         </div>
                    </li>
              `;

            $('.cv-education-list').append(li);
        });

        $(document).on('click', '.education-remove', function () {
            $(this).closest('.cv-education-list > li').remove();
        })

        //dự án
        $(document).on('click', '.project-add', function () {
            var li = `
                  <li>
                     <hr class="my-5">
                      <div class="mb-5 row">
                            <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tên dự án <span class=" red-cl">(*)</span></label>
                            <div class="col-sm-7 col-md-7 col-xl-5">
                                 <input type="text" class="form-control" name="name_project[]" >
                            </div>
                      </div>

                    <div class="mb-5 row">
                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thời gian dự án <span class=" red-cl">(*)</span></label>
                        <div class="col-sm-7 col-md-7 col-xl-5">
                            <input type="text" class="form-control"  name="time_project[]" >
                        </div>
                    </div>

                    <div class="py-2 row">
                        <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label h-100">Giới thiệu dự án <span class=" red-cl">(*)</span></label>
                        <div class="col-sm-7 col-md-7 col-xl-8">
                            <textarea id="editor1" class="form-control" cols="50" rows="8" name="introduce_pro[]"></textarea>
                        </div>
                    </div>

                        <div class="cv-experience-remove col-sm-2 text-end top-0 pt-5">
                             <span class="btn btn-danger project-remove" >Xóa</span>
                         </div>
                </li>
            `;

            $('.cv-project-list').append(li);
        });

        $(document).on('click', '.project-remove', function () {
            $(this).closest('.cv-project-list > li').remove();
        })
    })

</script>

{{-- Save Post--}}
<script>

</script>
{{-- Delete Exp --}}
<script type="text/javascript">
    function deleteItems(id,$number) {
        var token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{route('delete-exp')}}",
            dataType: "JSON",
            type: "DELETE",
            data: {id: id, _token: token,number:$number},
            success: function (data) {
                $(this).remove();
            }
        })
    }
</script>

<script type="text/javascript">
    $('.search__form-input > input').keyup(function () {
        var keywords=$(this).val();

        if(keywords != ''){
            var token=$('input[name="_token"]').val();

            $.ajax({
                url:"{{route('search_high')}}",
                method:'post',
                data:{key:keywords,_token:token},
                success:function (data) {
                    $('.form__suggess').fadeIn();
                    $('.form__suggess').html(data);
                }
            })
        }else{
            $('.form__suggess').fadeOut();
        }
    })

    $(document).on('click','.keysword-list',function () {
        $('.search__form-input > input').val($(this).text());
        $('.form__suggess').fadeOut();

    })
    $(document).on('click','body',function () {
        $('.form__suggess').fadeOut();
    })
</script>


</html>
