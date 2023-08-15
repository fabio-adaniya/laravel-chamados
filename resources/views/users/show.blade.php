@section('title', 'Usuário - '.$user->id)

<x-layout>
    <x-menu/>
    <div class="d-flex justify-content-center">
        <div class="card m-3" style="width: 500px">
            <div class="card-body">
                <div class="mb-3">Nome: {{ $user->name }}</div>
                <div class="mb-3">Usuário: {{ $user->username }}</div>
                <div class="mb-3">E-mail: {{ $user->email }}</div>
                <div class="mb-3">Ativo: {{ $user->ativo ? 'Sim' : 'Não' }}</div>
                <div class="mb-3">Perfil: {{ Perfil::DESCRICAO[$user->perfil_id] }}</div>
                <div class="d-flex">
                    <a href="{{ route('users.chamados', $user) }}" class="btn btn-info btn-sm">Chamados deste Usuário</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm ms-auto"><i class="fa-regular fa-pen-to-square"></i> Editar</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>