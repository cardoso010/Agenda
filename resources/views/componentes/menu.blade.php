<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Agenda
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="dashboard.html">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if (Auth::user()->hasRole('atendente'))
            <li>
                <a href="{{ route('paciente.index') }}">
                    <i class="pe-7s-user"></i>
                    <p>Pacientes</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('atendente'))
            <li>
                <a href="{{ route('categoria.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Categorias</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('atendente'))
            <li>
                <a href="{{ route('servico.index') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Serviços</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('especialista'))
            <li>
                <a href="{{ route('doenca.index') }}">
                    <i class="pe-7s-science"></i>
                    <p>Doenças</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('atendente'))
            <li>
                <a href="{{ route('especialista.index') }}">
                    <i class="pe-7s-map-marker"></i>
                    <p>Especialistas</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('atendente'))
            <li>
                <a href="{{ route('setor.index') }}">
                    <i class="pe-7s-bell"></i>
                    <p>Setores</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('atendente'))
            <li>
                <a href="{{ route('atendimento.index') }}">
                    <i class="pe-7s-bell"></i>
                    <p>Atendimentos</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('paciente'))
            <li>
                <a href="{{ route('atendimento.atendimentos_paciente', Auth::user()->id) }}">
                    <i class="pe-7s-bell"></i>
                    <p>Atendimentos</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('especialista'))
            <li>
                <a href="{{ route('atendimento.atendimentos_especialista', Auth::user()->id) }}">
                    <i class="pe-7s-bell"></i>
                    <p>Atendimentos</p>
                </a>
            </li>
            @endif
            <li>
                <a href="notifications.html">
                    <i class="pe-7s-bell"></i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="upgrade.html">
                    <i class="pe-7s-rocket"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>