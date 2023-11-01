@section('title', 'Usuário - '.$user->id)

<x-layout>
    <x-menu/>
    <div class="d-flex justify-content-center">
        <div class="card m-3" style="width: 500px">
            <div class="card-header d-flex blue-gray text-white">
                <span class="fw-bold my-2">{{ $user->name }}</span>
                <div class="dropdown ms-auto">
                    <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('users.edit', $user) }}" class="dropdown-item">Editar Usuário</a>
                        </li>
                        @if(!auth()->user()->isUsuario())
                            <li>
                                <a href="{{ route('users.chamados', $user) }}" class="dropdown-item">Visualizar Chamados do Usuário</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3"><span class="fw-bold">Usuário:</span> {{ $user->username }}</div>
                <div class="mb-3"><span class="fw-bold">E-mail:</span> {{ $user->email }}</div>
                <div class="mb-3"><span class="fw-bold">Ativo:</span> {{ $user->ativo ? 'Sim' : 'Não' }}</div>
                <div class="mb-3"><span class="fw-bold">Perfil:</span> {{ Perfil::DESCRICAO[$user->perfil_id] }}</div>
            </div>
        </div>
    </div>
</x-layout>