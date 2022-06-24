<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF | IT-DaNang</title>

    <style type="text/css">
        /*pdf*/

        /*@font-face {*/
        /*    font-family: 'DejaVu Sans',sans-serif;*/
        /*    font-style: normal;*/
        /*    font-weight: normal;*/
        /*    src: url("DejaVuSans.ttf") format('truetype');*/
        /*}*/
        * {
            padding: 0;
            margin: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        html {
            font-size: 100%;
        }

        body {
            font-family: 'Sans Serif';
            font-weight: 400;
            line-height: 1.5;
            position: relative;
            overflow-y: scroll;
        }

        .container {
            margin: 0 auto;
            padding: 30px 40px;
        }

        .container p {
            font-size: 14px;
        }

        .personal{
            margin-top: 40px;
        }
        .personal-avatar {
            display: inline-block;
            margin-right: 30px;
        }

        .personal-avatar img {
            width: 140px;
        }

        .personal-info {
            display: inline-block;
            position: absolute;
            top: 0;
            margin-top: 30px;
        }

        .personal-info-title {
            margin-bottom: 10px;
        }

        .personal-info span {
            font-size: 18px;
        }

        .personal-info h2 {
            font-size: 26px;
            text-transform: uppercase;
            color: #479099;
        }

        .personal-info-diffrence {
            margin-top: 40px;
        }

        .personal-info-diffrence p {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .personal-info-diffrence p span {
            margin-left: 14px;
            font-weight: normal;
            font-size: 14px;
        }

        .personal-info-items {
            display: inline-block;
            margin-right: 20px;
        }

        .title-section {
            color: #479099;
            margin: 20px 0;
        }

        .title-section-item {
            border-bottom: 3px solid #479099;
        }

        .title-section h4 {
            background: #479099;
            color: #fff;
            font-size: 18px;
            display: inline-block;
            padding: 0px 6px;
        }

        .flex-style {
            margin-bottom: 14px;
        }

        .timeline {
            margin-right: 50px;
            display: inline-block;
            position: absolute;
        }

        .timeline span {
            font-size: 16px;
            font-weight: 600;
        }

        .content-items {
            font-size: 14px;
            display: inline-block;
            margin-left: 220px;
        }

        .content-items i {
            font-size: 18px;
        }

        .content-items span {
            font-size: 16px;
            font-weight: 600;
        }

        .content-items ul {
            list-style: inherit;
            padding-left: 16px;
        }

        .projects-items {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 16px;
        }

        .projects-items p {
            padding: 4px 0;
        }

    </style>

</head>
<body>

<div class="container">
    <section class="personal">
        <div class="personal-avatar">
            <img src="{{$pic}}" alt="avatar">
        </div>

        <div class="personal-info">
            <div class="personal-info-title">
                <h2>{{$profile->name}}</h2>
                <span>{{$profile->position}}</span>

                <div class="personal-info-diffrence">
                    <div class="personal-info-items">
                        <p>Họ tên <span>{{$profile->name}}</span></p>
                        <p>Số điện thoại <span>{{$profile->phone_number}}</span></p>
                        <p>Địa chỉ <span>{{$profile->address}}</span></p>
                    </div>

                    <div class="personal-info-items">
                        <p>Ngày sinh <span>{{\Carbon\Carbon::parse($profile->dateOfBirth)->isoFormat('D/MM/YYYY')}}</span></p>
                        <p>Email <span>{{$profile->email}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="title-section">
        <div class="title-section-item">
            <h4>Giới thiệu bản thân</h4>
        </div>
    </div>
    <section class="introduce-personal">
        <p style="margin: 0">
            {!! html_entity_decode($profile->introduce) !!}
        </p>
    </section>

    @if(count($exp) > 0)
        <div class="title-section">
            <div class="title-section-item">
                <h4>Kinh nghiệm việc làm</h4>
            </div>
        </div>
        <section class="experience-work">
            @foreach($exp as $key=>$item)
                <div class="flex-style">
                    <div class="timeline">
                        <span>{{\Carbon\Carbon::parse($item->start_time)->isoFormat('MM-YYYY')}} - {{\Carbon\Carbon::parse($item->end_time)->isoFormat('MM-YYYY')}}</span>
                    </div>

                    <div class="content-items">
                        <span>{{$item->name_company}}</span> <br>
                        <i>{{$item->job_position}}</i>
                        <ul>
                            <p>{!! html_entity_decode($item->job_details) !!}</p>
                        </ul>
                    </div>
                </div>
            @endforeach
        </section>
    @endif


    @if(count($edu) > 0)
        <div class="title-section">
            <div class="title-section-item">
                <h4>Học vấn</h4>
            </div>
        </div>
        <section class="education">
            @foreach($edu as $key=>$item)
                <div class="flex-style">
                    <div class="timeline">
                        <span>{{\Carbon\Carbon::parse($item->start_year)->isoFormat('MM-YYYY')}} - {{\Carbon\Carbon::parse($item->end_year)->isoFormat('MM-YYYY')}}</span>
                    </div>

                    <div class="content-items">
                        <span>{{$item->name_school}}</span> <br>
                        <i>{{$item->degree}}</i>
                    </div>
                </div>
            @endforeach
        </section>
    @endif


    @if(count($pro) > 0)
        <div class="title-section">
            <div class="title-section-item">
                <h4>Dự án</h4>
            </div>
        </div>
        <section class="projects">
            @foreach($pro as $key=>$item)
                <div class="projects-items">
                    <div class="flex-style">
                        <div class="timeline">
                            <span>{{$item->name_project}}</span>
                            <p>{{$item->time_project}}</p>
                        </div>

                        <div class="content-items">
                            <span>Thông tin dự án</span>
                            <p>{!! html_entity_decode($item->introduce_pro) !!}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif
</div>
</body>
</html>
