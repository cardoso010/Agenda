<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/home" class="simple-text">
                <img src="{{ asset('img/logo.jpeg') }}" alt="" width="90" style="border-radius : 10%" />
            </a>
        </div>
        <ul class="nav">
            @if (Auth::user()->role == 0)
            <li>
                <a href="{{ route('atendente.index') }}">
                    <i class="pe-7s-map-marker"></i>
                    <p>Atendentes</p>
                </a>
            </li>
            @endif
            @if (!Auth::user()->hasRole('paciente')  || (Auth::user()->role == 0))
            <li>
                <a href="{{ route('paciente.index') }}">
                    <i class="pe-7s-user"></i>
                    <p>Pacientes</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 0)
            <li>
                <a href="{{ route('categoria.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Categorias</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 0)
            <li>
                <a href="{{ route('servico.index') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Serviços</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 3 || Auth::user()->role == 0)
            <li>
                <a href="{{ route('doenca.index') }}">
                    <i class="pe-7s-science"></i>
                    <p>Doenças</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 0)
            <li>
                <a href="{{ route('especialista.index') }}">
                    <i class="pe-7s-map-marker"></i>
                    <p>Especialistas</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 0)
            <li>
                <a href="{{ route('setor.index') }}">
                    <i class="pe-7s-bell"></i>
                    <p>Setores</p>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('atendimento.index') }}">
                    <i class="pe-7s-bell"></i>
                    <p>Atendimentos</p>
                </a>
            </li>
        </ul>
    </div>
</div>