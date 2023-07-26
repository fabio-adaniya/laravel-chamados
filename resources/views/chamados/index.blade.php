@section('title', 'Consultar chamados')

<x-layout>
    <x-menu/>
    <div class="card m-3">
        <table class="table">
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
                        <td style="width: 1%">{{ $chamado->id }}</td>
                        <td style="width: 1%">{{ Status::DESCRICAO[$chamado->status] }}</td>
                        <td style="width: 1%">{{ Urgencia::DESCRICAO[$chamado->urgencia] }}</td>
                        <td style="width: 1%" class="text-nowrap">{{ $chamado->created_at ? $chamado->created_at->format('d/m/Y H:m') : '' }}</td>
                        <td style="width: 1%" class="text-nowrap">{{ $chamado->updated_at ? $chamado->updated_at->format('d/m/Y H:m') : '' }}</td>
                        <td><a href="{{ route('chamados.show', $chamado) }}" class="nav-link text-secondary fw-bold">{{ $chamado->titulo }}</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="99">Nenhum chamado foi localizado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>