<nav class="navbar navbar-expand-lg bg-dark bg-opacity-10">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand text-info-subtle">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a aria-current="page" href="{{ route('home') }}" class="nav-link @if(request()->route()->getName() == 'home') bg-light fw-bold @endif">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chamados.create') }}" class="nav-link @if(request()->route()->getName() == 'chamados.create') bg-light fw-bold @endif">Criar chamado</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chamados.index') }}" class="nav-link @if(request()->route()->getName() == 'chamados.index') bg-light fw-bold @endif">Consultar chamados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Configurações</a>
                </li>
            </ul>
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-user"></i><span class="ms-1">{{ auth()->user()->name }}<span>
                    </button>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-right-from-bracket"></i><span class="ps-2">Sair</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>