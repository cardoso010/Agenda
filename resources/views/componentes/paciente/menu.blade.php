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
            <li>
                @if (!Auth::guest())
                <a href="{{ route('paciente.index') }}">
                    <i class="pe-7s-user"></i>
                    <p>Pacientes</p>
                </a>
                @endif
            </li>
            <li>
                @if (!Auth::guest())
                <a href="{{ route('atendimento.index') }}">
                    <i class="pe-7s-bell"></i>
                    <p>Atendimentos</p>
                </a>
                @endif
            </li>
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