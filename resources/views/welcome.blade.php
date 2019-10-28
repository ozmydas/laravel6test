<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #FF2D20;
                background: -webkit-linear-gradient(to right, #ef473a, #FF2D20);
                background: linear-gradient(to right, #ef473a, #FF2D20);
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
            }

            .links > a {
                color: gold;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links.menu > a{
                text-shadow: 1px 1px 3px rgba(50,50,50,0.6);
            }

            .top-right > a {
                background: #dc2424;
                padding: 5px 20px;
                border-radius: 10px;
                color: #fff;
                box-shadow: 1px 1px 3px rgba(50,50,50,0.4)
            }

            .top-right > a:hover{
                background: #e42424;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .backbackground{
                height: 100vh;
                width: 100vw;
                background: url('{{ asset('assets/img/laravelinverted.png') }}') no-repeat bottom left;
                background-size: contain;
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0.1;
            }
        </style>
    </head>
    <body>
        <div class="backbackground">
            
        </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel {{ versi() }}
                </div>

                <div class="links menu">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
