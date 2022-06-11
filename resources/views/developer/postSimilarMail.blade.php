<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>

        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
        }

        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top;
        }

        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */

        .body {
            background-color: #f6f6f6;
            width: 100%;
        }

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px;
        }

        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%;
        }

        .wrapper {
            box-sizing: border-box;
            padding: 20px;
        }

        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%;
        }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center;
        }

        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize;
        }

        p,
        ul,
        ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 10px;
        }
        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px;
        }

        a {
            color: #3498db;
            text-decoration: underline;
        }

        /* -------------------------------------
            BUTTONS
        ------------------------------------- */
        .btn {
            box-sizing: border-box;
            width: 100%; }
        .btn > tbody > tr > td {
            padding-bottom: 15px; }
        .btn table {
            width: auto;
        }
        .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
        }
        .btn a {
            background-color: #ffffff;
            border: solid 1px #3498db;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 12px 25px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .btn-primary table td {
            background-color: #3498db;
        }

        .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff;
        }

        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .clear {
            clear: both;
        }

        .mt0 {
            margin-top: 0;
        }

        .mb0 {
            margin-bottom: 0;
        }

        ul{
            list-style: none;
            padding-left: 0;
        }
        a{
            text-decoration: none;
        }

        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
        }

        .powered-by a {
            text-decoration: none;
        }

        .main{
            padding: 20px;
        }

        .introduction{

        }

        .post-similar{
            margin-top: 30px;
        }

        .post-similar-item{
            border-top: 3px solid #F3F3F3;
            padding-bottom: 20px;
        }

        .post-similar-item-content{
            margin-left: 4px;
        }

        .post-similar-link{
            font-size: 16px;
            margin: 14px 0 10px;
            display: block;
            font-weight: 600;
        }

        .post-similar-kills > span:nth-child(2){
            margin: 0 10px;
        }

        .info-introduction{
            border-top: 3px solid #F3F3F3;
            margin-left: 5px;
        }

        .info-introduction-link{
            text-align: end;
            display: block;
            margin:20px;
            font-style: italic;
        }

        .info-contact-list{
            background-color: #f2e7fa;
            padding: 20px;
            list-style: outside;
        }

        .info-contact-item > a{
            text-decoration: underline;
        }

        .powered-by > a{
            color: #3498db;
            text-decoration: underline;
        }

        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0;
        }

    </style>
</head>
<body>
<span class="preheader">IT DaNang.</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td>&nbsp;</td>
        <div class="content">
            <div class="headmain main">
                <img src="{{ $message->embed(public_path('users/img').'/logo-white.png') }}" class="headmail-logo" alt="logo" width="160px" />

            </div>

            <div class="main">
                <div class="introduction">
                    <p>Chào {{$name}}, </p>
                    <br>
                    <p>Chúng tôi đã tìm thấy {{count($post_similar)}} công việc phù hợp mà bạn đã ứng tuyển</p>
                </div>

                <div class="post-similar">
                    <ul class="post-similar-list">
                       @foreach($post_similar as $item)
                            <li class="post-similar-item">
                                <div class="post-similar-item-content">
                                    <a href="{{route('show-post-info',[$item->slug_title])}}" class="post-similar-link">{{$item->title}}</a>
                                    <p class="post-similar-company">{{$item->name_company}}</p>
                                    <p class="post-similar-salary">{{$item->salary_min}} - {{$item->salary_max}}</p>
                                    <div class="post-similar-kills">
                                        @foreach(Str::of($item->kills)->explode(',') as $kill)
                                            <span>{{$kill}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </li>

                        @endforeach

                    </ul>
                </div>

                <div class="info-introduction">
                    <a href="http://127.0.0.1:8000/" class="info-introduction-link">Xem thêm việc làm tương tự >></a>

                    <div class="info-contact">
                        <ul class="info-contact-list">
                            <li class="info-contact-item">
                                Nếu gặp khó khăn, bạn vui lòng liên hệ qua mail: <a href="">vothanh1320@gmail.com</a>
                            </li>

                            <li class="info-contact-item">
                                Hoặc gọi số hotline: 0774794604 để được hỗ trợ
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- START FOOTER -->
            <div class="footer">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                    <td class="content-block powered-by">
                        <a href="http://127.0.0.1:8000/">IT DaNang</a>.
                    </td>
                    </tr>
                </table>
            </div>
            <!-- END FOOTER -->

        </div>

        <td>&nbsp;</td>

    </tr>
</table>
</body>
</html>
