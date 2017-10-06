<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Balai Latihan Kerja Industri</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url('{{ asset('images/'.rand(1,2).'Home-Background.jpg') }}');
                background-size: cover;
                background-position: center;
                color: #ffffff;
                text-shadow: 2px 2px rgba(0, 0, 0, 0.4);
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 20px;
                top: 30px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                text-shadow: 4px 2px rgba(0, 0, 0, 0.4);
            }

            .links > a {
                color: #ffffff;
                border-radius: 25px;
                padding: 10px 25px;
                margin-right: 10px;
                background-color: rgba(255, 255, 255, 0.51);
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links-bottom > a {
                font-size: 30px;
                margin-right: 10px;
            }

            .m-b-md {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div>
                    <img src="{{ asset('images/BLKI-Provinsi-Banten.png') }}" style="height:250px">
                </div>
                <div class="title m-b-md">
                    Balai Latihan Kerja Industri
                    <br>
                    <small>Provinsi Banten</small>
                    <br>
                    <a class="btn btn-primary btn-block" style="font-size:30px;text-shadow:none" href="{{ url('/apps/ujian') }}">Aplikasi Ujian BLKI @fa(file-text-o)</a>
                </div>

                <div class="links-bottom">
                    <a class="btn btn-primary" href="{{ url('/home') }}">Halaman Utama</a>
                    <a class="btn btn-primary" href="{{ url('/home') }}">Profil BLKI</a>
                </div>
            </div>
        </div>
    </body>
</html>
