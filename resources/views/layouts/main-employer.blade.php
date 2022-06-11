{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8"/>--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>--}}
{{--    <meta name="viewport" content="width=`, initial-scale=1.0"/>--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <title>IT-DaNang</title>--}}

{{--    <link--}}
{{--        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"--}}
{{--        rel="stylesheet"--}}
{{--        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"--}}
{{--        crossorigin="anonymous"--}}
{{--    />--}}
{{--    <script--}}
{{--        src="https://kit.fontawesome.com/98ddc7f134.js"--}}
{{--        crossorigin="anonymous"--}}
{{--    ></script>--}}

{{--    --}}{{--  select option  --}}
{{--    <link href="{{url("users")}}/css/mobiscroll.javascript.min.css" rel="stylesheet" />--}}
{{--    <script src="{{url("users")}}/js/mobiscroll.javascript.min.js"></script>--}}

{{--    --}}{{--    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"--}}
{{--            integrity="sha512-bGYUkjDyyOMGm3ASzq3zRaWZ4CONNH1wAYMFch/Z0ASZrsg722SeRsX0FPPRZjTuJrqIMbB9fvY0LEMzyHeyeQ=="--}}
{{--            crossorigin="anonymous" referrerpolicy="no-referrer">--}}
{{--    </script>--}}



{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--    <link rel="stylesheet" href="{{url("users")}}/sass/main.css"/>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="header header-nofix">--}}
{{--    <div class="header__wrap container">--}}
{{--        <div class="header__logo">--}}
{{--            <a href="{{route('empl')}}">--}}
{{--                <img src="{{url('users')}}/img/logo-white.png" alt="logo" class="logo"/>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="header__nav">--}}
{{--            <ul class="header__nav-list ms-4">--}}
{{--                <li class="header__nav-item"><a class="tab-btn show " href="{{route('empl')}}">Tuyển dụng</a>--}}
{{--                </li>--}}
{{--                <li class="header__nav-item"><a class="tab-btn" href="{{route('show-candidate')}}">Ứng viên</a>--}}
{{--                </li>--}}
{{--                <li class="header__nav-item"><a class="tab-btn" href="{{route('show-statistic')}}">Thống kê</a>--}}
{{--                </li>--}}
{{--            </ul>--}}

{{--            <ul class="header__nav-list ms-auto">--}}
{{--                <li class="header__nav-item header__nav-user">--}}
{{--                    @if(Auth::user()->image)--}}
{{--                        <img src="{{url('empl/img/').'/'.Auth::user()->image }}" alt="image">--}}
{{--                    @else--}}
{{--                        <i class="fa-solid fa-circle-user"></i>--}}
{{--                    @endif--}}
{{--                    <span class="header__nav-user-name">{{Auth::user()->company}}</span>--}}

{{--                    <ul class="header__nav-user-dropdown">--}}
{{--                        <li class="header__nav-user-item ">--}}
{{--                            <a href="{{route('show-account-epl')}}" class="px-3 py-2">--}}
{{--                                <i class="fa-solid fa-user mr-2"></i>--}}
{{--                                Tài khoản--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="header__nav-user-item ">--}}
{{--                            <a href="{{ route('logout-emp') }}" class="px-3 py-2">--}}
{{--                                <i class="fa-solid fa-right-from-bracket mr-2"></i>--}}
{{--                                Đăng xuất--}}
{{--                            </a>--}}

{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="container my-4">--}}
{{--    @yield('content')--}}
{{--</div>--}}


{{--</body>--}}

{{--<script src="{{url('users')}}/js/app.js"></script>--}}
{{--<script--}}
{{--    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"--}}
{{--    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"--}}
{{--    crossorigin="anonymous"--}}
{{--></script>--}}
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"--}}
{{--        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--toast--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}


{{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
{{-- Ck-editor --}}
{{--<script>--}}

{{--    if (location.href.includes('post')){--}}
{{--        CKEDITOR.replace('editor_jd');--}}
{{--        CKEDITOR.replace('editor_jre');--}}
{{--        CKEDITOR.replace('editor_be');--}}
{{--    }--}}

{{--    $(document).ready(function() {--}}
{{--        toastr.options.timeOut = 4000;--}}
{{--        @if (Session::has('error'))--}}
{{--        toastr.error('{{ Session::get('error') }}');--}}
{{--        @elseif(Session::has('success'))--}}
{{--        toastr.success('{{ Session::get('success') }}');--}}
{{--        @endif--}}
{{--    });--}}

{{--    mobiscroll.select('#multiple-select', {--}}
{{--        inputElement: document.getElementById('my-input'),--}}
{{--        touchUi: false--}}
{{--    });--}}

{{--    mobiscroll.select('#multiple-select2', {--}}
{{--        inputElement: document.getElementById('my-input2'),--}}
{{--        touchUi: false--}}
{{--    });--}}
{{--</script>--}}

{{--Update Status--}}
{{--<script type="text/javascript">--}}
{{--    $(function () {--}}
{{--        $('.form-check-input').change(function () {--}}
{{--            var value = $(this).prop('checked') == true ? 1 : 0;--}}
{{--            var id=$(this).data('id');--}}
{{--            var user_developer=$(this).data('set');--}}

{{--            $.ajax({--}}
{{--                url: "{{route('update-status-candidate')}}",--}}
{{--                dataType: "JSON",--}}
{{--                type: "GET",--}}
{{--                data: {id: id,user_developer:user_developer,value:value},--}}
{{--                success: function (data) {--}}
{{--                    console.log(data.success)--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}

{{--Search--}}
{{--<script type="text/javascript">--}}
{{--    $('.search-key').on('keyup',function (e) {--}}
{{--        var keyword=$(this).val();--}}

{{--        $.ajax({--}}
{{--            url: "{{route('search-candidate')}}",--}}
{{--            dataType: "JSON",--}}
{{--            type: "get",--}}
{{--            data: {keyword:keyword},--}}
{{--            success: function (response) {--}}
{{--                $('.candidate').html(response);--}}
{{--            }--}}
{{--        })--}}

{{--    })--}}

{{--    $('.form-select').on('change',function (e) {--}}
{{--        var status=$(this).val();--}}
{{--        $.ajax({--}}
{{--            url: "{{route('filter-status')}}",--}}
{{--            dataType: "JSON",--}}
{{--            type: "get",--}}
{{--            data: {status:status},--}}
{{--            success: function (response) {--}}
{{--                $('.candidate').html(response);--}}
{{--            }--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}

{{--Chart--}}
{{--<script type="text/javascript">--}}


{{--    var colorDanger = "#FF1744";--}}

{{--    var chart =new Morris.Pie({--}}
{{--        element: 'myfirstchart',--}}
{{--            resize: true,--}}
{{--            colors: [--}}
{{--                '#E0F7FA',--}}
{{--                '#B2EBF2',--}}
{{--            ],--}}
{{--        data: [--}}
{{--            {label:"Duyệt", value:0 },--}}
{{--            {label:"Chưa duyệt", value:0,color:colorDanger}--}}
{{--        ],--}}

{{--    });--}}


{{--    $(document).ready(function () {--}}
{{--        $('.form-select-posts').change(function () {--}}
{{--            var token = $('input[name="_token"]').val();--}}
{{--            var value=$(this).val();--}}

{{--            $.ajax({--}}
{{--                url: "{{route('statistic-post-browsing')}}",--}}
{{--                dataType: "JSON",--}}
{{--                type: "post",--}}
{{--                data: {value:value,_token:token},--}}
{{--                success: function (data) {--}}

{{--                    chart.setData(--}}
{{--                        // data--}}
{{--                        [--}}
{{--                            {label:"Duyệt", value:data[0] },--}}
{{--                            {label:"Chưa duyệt", value:data[1],color:colorDanger}--}}
{{--                        ]--}}

{{--                    )--}}
{{--                }--}}
{{--            })--}}

{{--            // console.log(chart.data.value)--}}

{{--        })--}}
{{--   })--}}

{{--</script>--}}


{{--<script type="text/javascript">--}}


{{--</script>--}}
{{--</html>--}}


    <!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
        name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
        name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
    <!-- Favicon icon -->
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{url('empl')}}/assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{url('empl')}}/assets/libs/select2/dist/css/select2.min.css"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{url('empl')}}/assets/libs/jquery-minicolors/jquery.minicolors.css"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{url('empl')}}/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{url('empl')}}/assets/libs/quill/dist/quill.snow.css"
    />
    <link href="{{url('empl')}}/dist/css/style.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link
        href="{{url('empl')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
        rel="stylesheet"
    />

    {{--    Toast--}}
    <link href="{{url('empl')}}/assets/libs/toastr/build/toastr.min.css" rel="stylesheet" />

    {{--    CKeditor    --}}
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"
            integrity="sha512-bGYUkjDyyOMGm3ASzq3zRaWZ4CONNH1wAYMFch/Z0ASZrsg722SeRsX0FPPRZjTuJrqIMbB9fvY0LEMzyHeyeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    {{-- Morris chart   --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div
    id="main-wrapper"
    data-layout="vertical"
    data-navbarbg="skin5"
    data-sidebartype="full"
    data-sidebar-position="absolute"
    data-header-position="absolute"
    data-boxed-layout="full"
>

    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <a class="navbar-brand" href="{{route('empl')}}">
                    <!-- Logo icon -->
                    <b class="logo-icon ps-2">
                        <img
                            src="{{url('users')}}/img/logo-white.png"
                            alt="homepage"
                            class="light-logo"
                            width="180"
                        />
                    </b>
                </a>
                <a
                    class="nav-toggler waves-effect waves-light d-block d-md-none"
                    href="javascript:void(0)"
                >
                    <i class="ti-menu ti-close"></i>
                </a>
            </div>
            <div
                class="navbar-collapse collapse"
                id="navbarSupportedContent"
                data-navbarbg="skin5"
            >

                <ul class="navbar-nav float-start me-auto">
                    <li class="nav-item d-none d-lg-block">
                        <a
                            class="nav-link sidebartoggler waves-effect waves-light"
                            href="javascript:void(0)"
                            data-sidebartype="mini-sidebar"
                        >
                            <i class="mdi mdi-menu font-24"></i>
                        </a>
                    </li>

                    <li class="nav-item search-box">
                        <a
                            class="nav-link waves-effect waves-dark"
                            href="javascript:void(0)"
                        >
                            <i class="mdi mdi-magnify fs-4"></i>
                        </a>
                        <form class="app-search position-absolute">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search &amp; enter"
                            />
                            <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav float-end">

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="mdi mdi-bell font-24"></i>
                        </a>
                        <ul
                            class="
                                dropdown-menu dropdown-menu-end
                                mailbox
                                bounceInDown
                              "
                            aria-labelledby="2"
                        >
                            <ul class="list-style-none">
                                <li>
                                    <div class="">
                                        <!-- Message -->
                                        @foreach ($user->notifications as $notification)
                                            {{$user->unreadNotifications->markAsRead()}}
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                     <span
                                                         class="
                                                            btn btn-link btn-sm text-decoration-none btn-circle
                                                            d-flex
                                                            align-items-center
                                                            justify-content-center
                                                          "
                                                     >
                                                         <i class="fas fa-eye fs-4"></i>
                                                     </span>
                                                    <div class="ms-2">
                                                        {{-- <h5 class="mb-0">Event today</h5>--}}
                                                        <span class="mail-desc">
                                                                {{$notification->data['desc']}}
                                                            </span>
                                                    </div>
                                                </div>
                                                <span class="d-block text-end mx-3">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a
                            class="
                                nav-link
                                dropdown-toggle
                                text-muted
                                waves-effect waves-dark
                                pro-pic
                                "
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >

                            @if(Auth::user()->image)
                                <img src="{{url('empl/img/').'/'.Auth::user()->image }}" width="31" class="rounded-circle" alt="image">
                            @else
                                <i class="fa-solid fa-circle-user"></i>
                            @endif
                            <span class="header__nav-user-name">{{Auth::user()->company}}</span>

                        </a>
                        <ul
                            class="dropdown-menu dropdown-menu-end user-dd animated"
                            aria-labelledby="navbarDropdown"
                        >
                            <a class="dropdown-item" href="{{route('show-account-epl')}}">
                                <i class="mdi mdi-account me-1 ms-1"></i>
                                Tài khoản
                            </a>

                            <a class="dropdown-item" href="{{ route('logout-emp') }}">
                                <i class="fa fa-power-off me-1 ms-1"></i>
                                Đăng xuất
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <div class="dropdown-divider"></div>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="pt-4">
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{route('empl')}}"
                            aria-expanded="false"
                        ><i class="mdi mdi-view-dashboard"></i
                            ><span class="hide-menu">Trang chủ</span></a
                        >
                    </li>

                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{route('post.index')}}"
                            aria-expanded="false"
                        >
                            <i class="far fa-newspaper"></i>
                            <span class="hide-menu">Tin tuyển dụng</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{route('show-candidate')}}"
                            aria-expanded="false"
                        >
                            <i class="fas fa-users"></i>
                            <span class="hide-menu">Ứng viên</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect sidebar-link"
                            href="{{route('show-statistic')}}"
                            aria-expanded="false"
                        >
                            <i class="fas fa-chart-pie"></i>
                            <span class="hide-menu">Thống kê </span>
                        </a>
{{--                        <ul aria-expanded="false" class="collapse first-level">--}}
{{--                            <li class="sidebar-item">--}}
{{--                                <a href="form-basic.html" class="sidebar-link"--}}
{{--                                ><i class="mdi mdi-note-outline"></i--}}
{{--                                    ><span class="hide-menu"> Form Basic </span></a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                            <li class="sidebar-item">--}}
{{--                                <a href="form-wizard.html" class="sidebar-link"--}}
{{--                                ><i class="mdi mdi-note-plus"></i--}}
{{--                                    ><span class="hide-menu"> Form Wizard </span></a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    @yield('content')
</div>

<script src="{{url('empl')}}/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('empl')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('empl')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="{{url('empl')}}/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="{{url('empl')}}/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{url('empl')}}/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{url('empl')}}/dist/js/custom.min.js"></script>

<!--This page JavaScript -->

<script src="{{url('empl')}}/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
{{--<script src="{{url('empl')}}/dist/js/pages/mask/mask.init.js"></script>--}}

{{--Mulltiple select--}}
<script src="{{url('empl')}}/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="{{url('empl')}}/assets/libs/select2/dist/js/select2.min.js"></script>

{{--DataTable--}}
<script src="{{url('empl')}}/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="{{url('empl')}}/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="{{url('empl')}}/assets/extra-libs/DataTables/datatables.min.js"></script>

<script src="{{url('empl')}}/assets/libs/toastr/build/toastr.min.js"></script>

{{--Morris chart--}}
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>--}}
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>--}}

<script>
    $(".select2").select2();
    // $(".select3").select2();

    //DataTable
    $("#zero_config").DataTable();


    if (location.href.includes('post/')){
        CKEDITOR.replace('editor_jd');
        CKEDITOR.replace('editor_jre');
        CKEDITOR.replace('editor_be');
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

{{-- Update status candidate --}}
<script type="text/javascript">
    $(function () {
        $('.form-check-input').change(function () {
            var value = $(this).prop('checked') == true ? 1 : 0;
            var id=$(this).data('id');
            var user_developer=$(this).data('set');

            $.ajax({
                url: "{{route('update-status-candidate')}}",
                dataType: "JSON",
                type: "GET",
                data: {id: id,user_developer:user_developer,value:value},
                success: function (data) {
                    console.log(data.success)
                }
            })
        })
    })

</script>

{{--Send Mail--}}
<script>
    function sendMail (developer_id,post_id) {

        $.ajax({
            url: "{{route('send-mail')}}",
            dataType: "JSON",
            type: "GET",
            data: {developer_id:developer_id,post_id:post_id},
            success: function (data) {
                console.log(data.success)
            }
        })
    }
</script>

{{--Chart--}}
{{--<script type="text/javascript">--}}

{{--    var colorDanger = "#FF1744";--}}

{{--    var chart =new Morris.Bar({--}}
{{--        element: 'myfirstchart',--}}
{{--        resize: true,--}}
{{--        hideHover:'auto',--}}
{{--        barColors: [--}}
{{--            '#0875ff',--}}
{{--            '#e52525',--}}
{{--        ],--}}
{{--        data: [--}}
{{--            {totalApply: 12, browsing: 5, timer: "2022-05-05"},--}}
{{--            {totalApply: 2, browsing: 1, timer: "2022-06-05"},--}}
{{--            {totalApply: 4, browsing: 7, timer: "2022-07-05"},--}}
{{--            {totalApply: 2, browsing: 1, timer: "2022-08-05"},--}}
{{--            {totalApply: 12, browsing: 5, timer: "2022-09-05"},--}}
{{--            {totalApply: 12, browsing: 5, timer: "2022-09-05"},--}}
{{--            {totalApply: 12, browsing: 5, timer: "2022-09-05"},--}}
{{--        ],--}}

{{--        xkey: 'timer',--}}
{{--        ykeys: ['quantity_apply','quantity_browsing'],--}}
{{--        labels: ['Số lượng ứng tuyển','Số lượng đã duyệt hồ sơ']--}}
{{--    });--}}

{{--    $(document).ready(function () {--}}
{{--        $('.form-select').change(function () {--}}
{{--            var token = $('input[name="_token"]').val();--}}
{{--            var value=$(this).val();--}}
{{--            var timerfilter=$('.form-select-filter').val();--}}

{{--            $.ajax({--}}
{{--                url: "{{route('statistics-candidate')}}",--}}
{{--                dataType: "JSON",--}}
{{--                type: "post",--}}
{{--                data: {value:value,timer:timerfilter,_token:token},--}}
{{--                success: function (data) {--}}
{{--                    if(data.length > 0){--}}
{{--                        chart.setData(data)--}}
{{--                    }else{--}}
{{--                        chart.setData([{timer:0}])--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}

{{--        $('.form-select-filter').change(function () {--}}
{{--            var token = $('input[name="_token"]').val();--}}
{{--            var value=$('.form-select').val();--}}
{{--            var timerfilter=$(this  ).val();--}}

{{--            $.ajax({--}}
{{--                url: "{{route('statistics-candidate')}}",--}}
{{--                dataType: "JSON",--}}
{{--                type: "post",--}}
{{--                data: {value:value,timer:timerfilter,_token:token},--}}
{{--                success: function (data) {--}}
{{--                    if(data.length > 0){--}}
{{--                        chart.setData(data)--}}
{{--                    }else{--}}
{{--                        chart.setData([{timer:0}])--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}

{{--        })--}}
{{--    })--}}

{{--</script>--}}



</body>
</html>
