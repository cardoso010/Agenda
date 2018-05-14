<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                <img src="{{ asset('img/logo.jpeg') }}" alt="" width="90" style="border-radius : 10%" />
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="dashboard.html">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard {{ dump(Auth::user()->hasRole('atendente')) }} </p>
                    <p>Dashboard {{ dump(Auth::user()->hasRole('especialista')) }} </p>
                    <p>Dashboard {{ dump(Auth::user()->hasRole('paciente')) }} </p>
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
        </ul>
    </div>
</div>