<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Balai Latihan Kerja Industri</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

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
                right: 10px;
                top: 18px;
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
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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
                </div>

                <div class="links">
                    <a href="{{ url('/home') }}">Halaman Utama</a>
                    <a href="#">Tentang</a>
                </div>
            </div>
        </div>
    </body>
</html>
