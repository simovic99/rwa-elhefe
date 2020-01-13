
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>El Hefe</title>
        <link rel="icon" href="{!! asset('images/icon.png') !!}"/>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: rgb(40,35,41);;
                color: #e07446;
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
                color: #e07446;
                padding: 0 25px;
                font-size: 13px;
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
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Prijava</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registracija</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ asset('images/icon.png')}}"/>
                </div>

                <div class="links">
                    <a href="#">Pocetna</a>
                 <a href="{{url('/naruci')}}">Naruči online</a>

                    <a href="/kontakt">Kontakt</a>
                    @auth
                        @if(Auth::user()->isAdmin() )

                            <a href="{{url('/cijene')}}">Upravljanje ponudom</a>

                        @endif
                            @if(Auth::user()->isSuperAdmin() )

                                <a href="{{url('/korisnici')}}">Upravljanje korisnicima</a>
                                <a href="{{url('/cijene')}}">Upravljanje ponudom</a>

                            @endif

                    @endauth

                </div>
            </div>
        </div>
    </body>
</html>
