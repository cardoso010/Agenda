<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>@include('util.style')</head>
<body>
    <div id="app">
         <div class="wrapper">
                @auth
                    @include('componentes.paciente.menu')
                @endauth
                    
                    <!-- Condicao para o ajustar o front-end -->
                    @if(Auth::check()) 
                    <div class="main-panel"> 
                    @else 
                    <div class="main-panel default">
                    @endif 

                    <!-- Cabecalho -->
                    @auth
                        @include('componentes.cabecalho')
                    @endauth

                    <div class="content">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>

                    <!-- Rodapé -->
                    @auth
                        @include('componentes.rodape')
                    @endauth
                </div>
            </div>
    </div>
    @include('util.script')
</body>
</html>
