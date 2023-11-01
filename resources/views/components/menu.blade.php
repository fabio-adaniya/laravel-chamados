<nav class="navbar navbar-expand-lg dark-blue">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand text-info-subtle text-white">{{ config('app.name') }}</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if(request()->route()->getName() == 'home') fw-bold text-warning @else text-white @endif">Página inicial</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chamados.create') }}" class="nav-link @if(request()->route()->getName() == 'chamados.create') fw-bold text-warning @else text-white @endif">Cadastrar Chamado</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chamados.index') }}" class="nav-link @if(request()->route()->getName() == 'chamados.index') fw-bold text-warning @else text-white @endif">Consultar Chamados</a>
                </li>
                @can('perfil-tecnico')
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link @if(request()->route()->getName() == 'users.create') fw-bold text-warning @else text-white @endif">Cadastrar Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link @if(request()->route()->getName() == 'users.index') fw-bold text-warning @else text-white @endif">Consultar Usuários</a>
                    </li>
                @endcan
            </ul>
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a href="{{ route('users.show', auth()->user()) }}" class="btn btn-sm bg-white">
                        <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm bg-white text-danger">
                            <i class="fa-solid fa-right-from-bracket"></i><span class="ps-2">Sair</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>