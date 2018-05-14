<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('util.style')
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <!--<a href="{{ route('register') }}">Cadastrar</a> -->
                    @endauth
                </div>
            @endif
        </div>
        <div class="wrapper">
            <div class="main-panel default">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <img src="{{ asset('img/logo.jpeg') }}" alt="" width="25%" style="border-radius : 10%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('util.script')
</html>
