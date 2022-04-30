<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=`, initial-scale=1.0" />
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

    <link rel="stylesheet" href="{{url("users")}}/sass/main.css" />
</head>
<body>

    @if(Str::contains(url()->current(),['login','register']))
        <div class="header header-nofix">
            <div class="header__wrap container">
                <div class="header__logo">
                    <a href="/">
                        <img src="{{url('users')}}/img/logo-white.png" alt="logo" class="logo" />
                    </a>
                </div>
                <div class="header__nav">
                    <ul class="header__nav-list ms-4">
                        <li class="header__nav-item"><a href="">Tìm việc</a></li>
                        <li class="header__nav-item"><a href="{{route('createCV')}}">Tạo CV</a></li>
                    </ul>

                    <ul class="header__nav-list ms-auto">
                        <li class="header__nav-item"><a target="_blank" href="../Employer/HomeEmployer.html">Nhà tuyển dụng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @elseif(Str::contains(url()->current(),'employer'))
        <div class="header header-nofix">
            <div class="header__wrap container">
                <div class="header__logo">
                    <a href="/">
                        <img src="./img/logo-white.png" alt="logo" class="logo" />
                    </a>
                </div>
                <div class="header__nav">
                    <ul class="header__nav-list ms-4">
                        <li class="header__nav-item"><a class="tab-btn show " href="#/posts" data-id="posts">Tuyển dụng</a></li>
                        <li class="header__nav-item"><a class="tab-btn" href="#/candidate" data-id="cabdidates">Ứng viên</a></li>
                        <li class="header__nav-item"><a class="tab-btn" href="#/statistic" data-id="statiscal">Thống kê</a></li>
                    </ul>

                    <ul class="header__nav-list ms-auto">
                        <li class="header__nav-item header__nav-user">
                            <i class="fa-solid fa-circle-user"></i>
                            <span class="header__nav-user-name">{{Auth::user()->name}}</span>

                            <ul class="header__nav-user-dropdown">
                                <li class="header__nav-user-item ">
                                    <a href="/" class="px-3 py-2">
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
                        <img src="{{url('users')}}/img/logo-white.png" alt="logo" class="logo" />
                    </a>
                </div>

                <div class="header__nav">
                    <ul class="header__nav-list ms-4">
                        <li class="header__nav-item"><a href="">Tìm việc</a></li>
                        <li class="header__nav-item"><a href="{{route('createCV')}}">Tạo CV</a></li>
                    </ul>

                    <ul class="header__nav-list ms-auto">
                        @guest()
                            @if(Route::has('login') || Route::has('register'))
                                <li class="header__nav-item"><a href="{{ route('login') }}">Đăng nhập</a></li>
                                <li class="header__nav-item">|</li>
                                <li class="header__nav-item"><a target="_blank" href="{{route('show-login-emp')}}">Nhà tuyển dụng</a></li>
                            @endif
                            @else
                                <li class="header__nav-item header__nav-user">
                                    <i class="fa-solid fa-circle-user"></i>
                                    <span class="header__nav-user-name">{{Auth::user()->name}}</span>

                                    <ul class="header__nav-user-dropdown">
                                        <li class="header__nav-user-item ">
                                            <a href="{{route('show-account')}}" class="px-3 py-2">
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
                    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>

                    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                        <div class="search-tablet d-flex justify-content-center p-2">
                            <button type="button" class="btn-close text-reset align-self-end pe-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                            <form action="" class="search__form mx-auto">
                                <div class="search__form-input">
                                    <div class="search-icon">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <input
                                        name="search"
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="Nhập theo kỹ năng, chức vụ, công ty..."
                                        required
                                    />
                                </div>

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

                            <!-- </div> -->
                        </div>
                    </div>

                    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header justify-content-end">
                            <button type="button" class="btn-close text-reset " data-bs-dismiss="offcanvas" aria-label="Close">

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
</body>

<script src="{{url('users')}}/js/app.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="text/javascript">


</script>

</html>
