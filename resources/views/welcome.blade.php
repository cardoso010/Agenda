<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('util.style')
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <div class="main-panel default">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <img src="{{ asset('img/logo.jpeg') }}" alt="" width="15%" style="border-radius : 10%" />
                        </div>
                        <div class="flex-center position-ref full-height">
                            
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Bem vindo - Acesso ao Sistema</div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">E-mail</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Senha</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-8 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Login
                                                        </button>

                                                        <a href="{{ route('password.request') }}">
                                                            Perdeu sua senha?
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('util.script')
</html>
