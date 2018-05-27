
<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> 
            
        @if (Auth::user()->hasRole('atendente') && (!Auth::user()->role == 0))
            Atendente : {{ Auth::user()->name }} 
        @elseif (Auth::user()->hasRole('especialista') && (!Auth::user()->role == 0))
            Especialista : {{ Auth::user()->name }} 
        @elseif (Auth::user()->hasRole('paciente') && (!Auth::user()->role == 0))
            Paciente : {{ Auth::user()->name }}
        @elseif (Auth::user()->role == 0)
            Super Usuário : {{ Auth::user()->name }} 
        @endif
    
        </a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>