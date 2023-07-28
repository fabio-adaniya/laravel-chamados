@section('title', 'Consultar chamados')

<x-layout>
    <x-menu/>
    @if(auth()->user()->perfil_id != Perfil::USUARIO)
        <div class="card m-3">
            <div class="card-body">
                <form action="" method="GET">
                    <div class="d-flex">
                        <div class="form-check">
                            <input id="meus_chamados-input" name="meus_chamados" type="checkbox" class="form-check-input" @if(Request::query("meus_chamados")) checked @endif>
                            <label class="form-check-label" for="meus_chamados-input">
                                Buscar apenas os meus chamados
                            </label>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-success ms-3">
                            <i class="fa-solid fa-magnifying-glass"></i> Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="card m-3">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Urgência</th>
                        <th scope="col">Abertura</th>
                        <th scope="col">Última atualização</th>
                        <th scope="col">Título</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chamados as $chamado)
                        <tr>
                            <td style="width: 1%" class="border text-nowrap">{{ $chamado->id }}</td>
                            <td style="width: 1%" class="border text-nowrap">{{ Status::DESCRICAO[$chamado->status] }}</td>
                            <td style="width: 1%" class="border text-nowrap">{{ Urgencia::DESCRICAO[$chamado->urgencia] }}</td>
                            <td style="width: 1%" class="border text-nowrap">{{ $chamado->created_at ? $chamado->created_at->format('d/m/Y H:m') : '' }}</td>
                            <td style="width: 1%" class="border text-nowrap">{{ $chamado->updated_at ? $chamado->updated_at->format('d/m/Y H:m') : '' }}</td>
                            <td class="border"><a href="{{ auth()->user()->perfil_id == Perfil::USUARIO ? route('chamados.show', $chamado) : route('chamados.edit', $chamado) }}" class="nav-link text-secondary fw-bold">{{ $chamado->titulo }}</a></td>
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