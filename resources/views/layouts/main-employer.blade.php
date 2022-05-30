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

    {{--  select option  --}}
    <link href="{{url("users")}}/css/mobiscroll.javascript.min.css" rel="stylesheet" />
    <script src="{{url("users")}}/js/mobiscroll.javascript.min.js"></script>

    {{--    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"
            integrity="sha512-bGYUkjDyyOMGm3ASzq3zRaWZ4CONNH1wAYMFch/Z0ASZrsg722SeRsX0FPPRZjTuJrqIMbB9fvY0LEMzyHeyeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url("users")}}/sass/main.css"/>
</head>
<body>

<div class="header header-nofix">
    <div class="header__wrap container">
        <div class="header__logo">
            <a href="{{route('empl')}}">
                <img src="{{url('users')}}/img/logo-white.png" alt="logo" class="logo"/>
            </a>
        </div>
        <div class="header__nav">
            <ul class="header__nav-list ms-4">
                <li class="header__nav-item"><a class="tab-btn show " href="{{route('empl')}}">Tuyển dụng</a>
                </li>
                <li class="header__nav-item"><a class="tab-btn" href="{{route('show-candidate')}}">Ứng viên</a>
                </li>
                <li class="header__nav-item"><a class="tab-btn" href="{{route('show-statistic')}}">Thống kê</a>
                </li>
            </ul>

            <ul class="header__nav-list ms-auto">
                <li class="header__nav-item header__nav-user">
                    @if(Auth::user()->image)
                        <img src="{{url('empl/img/').'/'.Auth::user()->image }}" alt="image">
                    @else
                        <i class="fa-solid fa-circle-user"></i>
                    @endif
                    <span class="header__nav-user-name">{{Auth::user()->company}}</span>

                    <ul class="header__nav-user-dropdown">
                        <li class="header__nav-user-item ">
                            <a href="{{route('show-account-epl')}}" class="px-3 py-2">
                                <i class="fa-solid fa-user mr-2"></i>
                                Tài khoản
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

<div class="container my-4">
    @yield('content')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{--toast--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- Ck-editor --}}
<script>

    if (location.href.includes('post')){
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

    mobiscroll.select('#multiple-select', {
        inputElement: document.getElementById('my-input'),
        touchUi: false
    });

    mobiscroll.select('#multiple-select2', {
        inputElement: document.getElementById('my-input2'),
        touchUi: false
    });
</script>

{{--Update Status--}}
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

{{--Search--}}
<script type="text/javascript">
    $('.search-key').on('keyup',function (e) {
        var keyword=$(this).val();

        $.ajax({
            url: "{{route('search-candidate')}}",
            dataType: "JSON",
            type: "get",
            data: {keyword:keyword},
            success: function (response) {
                $('.candidate').html(response);
            }
        })

    })

    $('.form-select').on('change',function (e) {
        var status=$(this).val();
        console.log(status)
        $.ajax({
            url: "{{route('filter-status')}}",
            dataType: "JSON",
            type: "get",
            data: {status:status},
            success: function (response) {
                $('.candidate').html(response);
            }
        })
    })
</script>
</html>
