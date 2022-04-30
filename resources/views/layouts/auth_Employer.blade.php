<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/98ddc7f134.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{url('users')}}/sass/main.css" />
    <title>Login</title>
</head>
<body style=" background-color: white;">

<div class="main">
    <section id="login">
        <div class="conatiner-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-box">
                        <img src="{{url('users')}}/img/logo-black.png" alt="logo" width="100">
                        <h3 class="card-box-title">Nhà tuyển dụng</h3>
                        <img src="{{url('users')}}/img/bannerLoginEmpl.png" class="mb-3" alt="image" width="450">
                    </div>
                </div>

                @yield('content')

            </div>
        </div>
    </section>
</div>


</body>

<!-- <script src="./js/app.js"></script> -->

</html>
