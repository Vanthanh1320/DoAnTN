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
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

{{--    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"
            integrity="sha512-bGYUkjDyyOMGm3ASzq3zRaWZ4CONNH1wAYMFch/Z0ASZrsg722SeRsX0FPPRZjTuJrqIMbB9fvY0LEMzyHeyeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    {{--    Owlcarousel   --}}
    <link rel="stylesheet" href="{{url("users/OwlCarousel2-2.3.4/docs/assets")}}/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url("users/OwlCarousel2-2.3.4/docs/assets")}}/owlcarousel/assets/owl.theme.default.min.css">

    <link rel="icon" type="image/png" sizes="96x96"  href="{{url('users/img').'/favicon16x16.png'}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url("users")}}/sass/main.css"/>



</head>
<body {{Str::contains(url()->current(),'cv') ? "data-bs-spy=scroll data-bs-target=#list-example data-offset=10 tabindex=0" : ''}}>

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
                    <li class="header__nav-item"><a target="_blank" href="{{url('employer/login')}}">Nhà tuyển dụng</a></li>
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
                        <li class="header__nav-item header__nav-notify">
                            <i class="fa-solid fa-bell"></i>

                            <div class="header__nav-notify-quantity {{count($user->unreadNotifications) > 0 ? 'show':''}}">
                                <p>{{count($user->unreadNotifications) !== 0 ? count($user->unreadNotifications):''}}</p>
                            </div>

                            <div class="header__nav-notify-dropdown px-3 py-3">
                                <h2>Thông báo</h2>

                                <ul class="header__nav-notify-list ">
                                    @foreach ($user->notifications as $notification)
                                        {{$user->unreadNotifications->markAsRead()}}
                                        <li class="header__nav-notify-item mb-3 p-0">
                                            <div class="header__nav-notify-box">
                                                <div class="header__nav-notify-img">
                                                    <img src="{{isset($notification->data['image']) ? url('empl/img').'/'.$notification->data['image'] : url('users/img/logo-white.png')}}" alt="">
                                                </div>

                                                <div class="header__nav-notify-content ms-3">
{{--                                                    @if(isset($notification->data['name']))--}}

{{--                                                            <h2> {{$notification->data['name']}}</h2>--}}
{{--                                                    @endif--}}

                                                    <p class="mb-1">{!! html_entity_decode($notification->data['desc']) !!}</p>
                                                    <span>{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                                                </div>

                                                @csrf
                                            </div>
                                        </li>

                                    @endforeach
                                </ul>
                                <span class="d-block text-center" onclick="removeNotify({{Auth::user()->id}})">Xóa tất cả thông báo</span>

                            </div>
                        </li>

                        <li class="header__nav-item header__nav-user">
                            @if(Auth::user()->image)
                                <img src="{{url('img/account').'/'.Auth::user()->image }}" alt="image">
                            @else
                                <i class="fa-solid fa-circle-user"></i>
                            @endif
                            <span class="header__nav-user-name">{{Auth::user()->name}}</span>
                            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">

                            <ul class="header__nav-user-dropdown p-1">
                                <li class="header__nav-user-item p-0">
                                    <a href="{{route('show-account')}}" class="px-3 py-2">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        Tài khoản
                                    </a>
                                </li>
                                <li class="header__nav-user-item p-0">
                                    <a href="{{route('save-post')}}" class="px-3 py-2">
                                        <i class="fa-solid fa-bookmark mr-2"></i>
                                        Việc đã lưu
                                    </a>
                                </li>
                                <li class="header__nav-user-item p-0">
                                    <a href="{{route('recruitment-list')}}" class="px-3 py-2">
                                        <i class="fa-solid fa-square-check"></i>
                                        Việc ứng tuyển
                                    </a>
                                </li>
                                <li class="header__nav-user-item p-0">
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

                        <form action="{{route('search')}}" method="post" class="search__form mx-auto">
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

    @if(!Str::contains(url()->current(),['viec-da-luu','viec-ung-tuyen','cv','tai-khoan','tim-kiem']))
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

{{--    Owlcarousel   --}}
<script src="{{url("users/OwlCarousel2-2.3.4/docs/assets/vendors")}}/jquery.min.js"></script>
<script src="{{url("users/OwlCarousel2-2.3.4/docs/assets")}}/owlcarousel/owl.carousel.min.js"></script>

{{-- Ck-editor --}}
<script>

    if(location.href.includes('cv/create')){
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor_exp1');
        CKEDITOR.replace('editor_pro1');
    }

    $(document).ready(function() {
        toastr.options.timeOut = 3000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });



    // autoplay:false
    autoplayTimeout:5000
    autoplayHoverPause:false

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:4,
        loop:true,
        margin:16,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true
    });
</script>


<script type="text/javascript">
    const editorExpElms=document.querySelectorAll('textarea[name="job_details[]"]');
    const editorProElms=document.querySelectorAll('textarea[name="introduce_pro[]"]');
    var i;

    if(location.href.includes('edit')){
        CKEDITOR.replace('editor1');
        showEditors(editorExpElms);
        showEditors(editorProElms);

        i=editorExpElms.length || editorProElms.length;
    }else{
        i=1;
    }

    function showEditors(elements) {
        for (const element of elements) {
            CKEDITOR.replace(element.id);
        }
    }

    $(document).ready(function () {
        //kinh nghiệm

        $(document).on('click', '.experience-add', function () {
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

            var editor_exp='editor_exp'+ i;

            CKEDITOR.replace(editor_exp);

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
                            <textarea id="editor_pro${++i}" class="form-control" cols="50" rows="8" name="introduce_pro[]"></textarea>
                        </div>
                    </div>

                        <div class="cv-experience-remove col-sm-2 text-end top-0 pt-5">
                             <span class="btn btn-danger project-remove" >Xóa</span>
                         </div>
                </li>
            `;

            $('.cv-project-list').append(li);

            var editor_pro='editor_pro'+ i;

            CKEDITOR.replace(editor_pro);
        });

        $(document).on('click', '.project-remove', function () {
            $(this).closest('.cv-project-list > li').remove();
        })
    })


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

{{-- Pagination --}}
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click','.pagination a',function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];

            getMorePost(page)
        });
    });

    function getMorePost(page) {
        $.ajax({
            type: 'GET',
            url:'{{route('get-more-post')}}' + '?page=' + page,
            success:function (data) {
                $('.post-data').html(data);
            }
        })
    }
</script>

{{-- Notify --}}
<script type="text/javascript">
    const notifyElement=document.querySelector('.header__nav-notify');

    if (notifyElement){

        $(document).on('click',function (e) {
            if (e.target === notifyElement || e.target.parentElement === notifyElement ){
                $('.header__nav-notify-quantity').removeClass('show');

                return  $('.header__nav-notify-dropdown').toggleClass('show');
            }
            $('.header__nav-notify-dropdown').removeClass('show');

        })
    }

    function removeNotify(id) {
        var token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{route('remove-notify')}}",
            dataType: "JSON",
            type: "POST",
            data: {id: id, _token: token},
            success: function (data) {
                $(this).remove();
            }
        })

        $('.header__nav-notify-list').remove();

    }
</script >

</html>
