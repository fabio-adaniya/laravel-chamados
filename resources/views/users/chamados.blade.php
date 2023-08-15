<x-layout>
    <x-menu/>
    <div class="table-responsive m-3">
        <table class="table table-sm table-hover">
            <thead class="teal text-white">
                <tr>
                    <th colspan="99" class="text-center">Chamados do Usuário: {{ $user->name }}</th>
                </tr>
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
</x-layout>