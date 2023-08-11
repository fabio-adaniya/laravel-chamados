@section('title', 'Usuário - '.$user->id)

<x-layout>
    <x-menu/>
    <ul class="nav nav-tabs m-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="usuario-tab" data-bs-toggle="tab" data-bs-target="#usuario" type="button" role="tab" aria-controls="usuario" aria-selected="true">
                Usuário
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="chamados-tab" data-bs-toggle="tab" data-bs-target="#chamados" type="button" role="tab" aria-controls="chamados" aria-selected="false">
                Chamados deste usuário
            </button>
        </li>
    </ul>
    <div class="tab-content m-3" id="myTabContent">
        <div class="tab-pane fade show active" id="usuario" role="tabpanel" aria-labelledby="usuario-tab">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 500px">
                    <div class="card-body">
                        <div class="mb-3">Nome: {{ $user->name }}</div>
                        <div class="mb-3">Usuário: {{ $user->username }}</div>
                        <div class="mb-3">E-mail: {{ $user->email }}</div>
                        <div class="mb-3">Ativo: {{ $user->ativo ? 'Sim' : 'Não' }}</div>
                        <div class="mb-3">Perfil: {{ Perfil::DESCRICAO[$user->perfil_id] }}</div>
                        <div class="d-flex">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm ms-auto"><i class="fa-regular fa-pen-to-square"></i> Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade table-responsive" id="chamados" role="tabpanel" aria-labelledby="chamados-tab">
            <table class="table table-sm table-hover">
                <thead class="teal text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Status</th>
                        <th scope="col">Urgência</th>
                        <th scope="col">Abertura</th>
                        <th scope="col">Última atualização</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user->chamados as $chamado)
                        <tr>
                            <td class="border text-nowrap">{{ $chamado->id }}</td>
                            <td class="border"><a href="{{ auth()->user()->perfil_id == Perfil::USUARIO ? route('chamados.show', $chamado) : route('chamados.edit', $chamado) }}">{{ $chamado->titulo }}</a></td>
                            <td class="border text-nowrap">{{ Status::DESCRICAO[$chamado->status] }}</td>
                            <td class="border text-nowrap">{{ Status::DESCRICAO[$chamado->urgencia] }}</td>
                            <td class="border text-nowrap">{{ $chamado->created_at ? $chamado->created_at->format('d/m/Y H:m') : '' }}</td>
                            <td class="border text-nowrap">{{ $chamado->updated_at ? $chamado->updated_at->format('d/m/Y H:m') : '' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="99">Nenhum chamado foi localizado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>