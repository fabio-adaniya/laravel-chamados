@section('title', 'Consultar Chamados')

@push('script')
    <script>
        $("#input-registros_por_pagina").change(function(){
            $("form").submit();
        })
    </script>
@endpush

<x-layout>
    <x-menu/>
    <div class="card m-3 bg-light">
        <div class="card-body">
            <form action="" method="GET">
                <div class="d-flex gap-3 flex-wrap">
                    <select name="status" class="form-select-sm">
                        <option value="">Selecione um Status</option>
                        <option value="{{ Status::ABERTO }}" @if(Request::query('status') == Status::ABERTO) selected @endif>
                            {{ Status::DESCRICAO[Status::ABERTO] }}
                        </option>
                        <option value="{{ Status::EM_ANDAMENTO }}" @if(Request::query('status') == Status::EM_ANDAMENTO) selected @endif>
                            {{ Status::DESCRICAO[Status::EM_ANDAMENTO] }}
                        </option>
                        <option value="{{ Status::SOLUCIONADO }}" @if(Request::query('status') == Status::SOLUCIONADO) selected @endif>
                            {{ Status::DESCRICAO[Status::SOLUCIONADO] }}
                        </option>
                    </select>
                    <select name="urgencia" class="form-select-sm">
                        <option value="">Selecione a Urgência</option>
                        <option value="{{ Urgencia::BAIXA }}" @if(Request::query('urgencia') == Urgencia::BAIXA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::BAIXA] }}</option>
                        <option value="{{ Urgencia::MEDIA }}" @if(Request::query('urgencia') == Urgencia::MEDIA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::MEDIA] }}</option>
                        <option value="{{ Urgencia::ALTA }}" @if(Request::query('urgencia') == Urgencia::ALTA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::ALTA] }}</option>
                    </select>
                    @if(auth()->user()->perfil_id != Perfil::USUARIO)
                        <div class="form-check">
                            <input id="meus_chamados-input" name="meus_chamados" type="checkbox" class="form-check-input" @if(Request::query("meus_chamados")) checked @endif>
                            <label class="form-check-label" for="meus_chamados-input">
                                Buscar apenas os meus chamados
                            </label>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-sm btn-outline-success">
                        <i class="fa-solid fa-magnifying-glass"></i> Pesquisar
                    </button>
                    <div class="ms-auto">
                        Exibir registros por página:
                        <select name="registros_por_pagina" id="input-registros_por_pagina" class="form-select-sm">
                            <option value="5" @if(Request::query('registros_por_pagina') == 5) selected @endif>5</option>
                            <option value="10" @if(Request::query('registros_por_pagina') == 10) selected @endif>10</option>
                            <option value="15" @if((!Request::query('registros_por_pagina')) || (Request::query('registros_por_pagina') == 15)) selected @endif>15</option>
                            <option value="20" @if(Request::query('registros_por_pagina') == 20) selected @endif>20</option>
                            <option value="30" @if(Request::query('registros_por_pagina') == 30) selected @endif>30</option>
                            <option value="40" @if(Request::query('registros_por_pagina') == 40) selected @endif>40</option>
                            <option value="50" @if(Request::query('registros_por_pagina') == 50) selected @endif>50</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive m-3">
        <table class="table table-sm table-hover">
            <thead class="blue-gray text-white">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Urgência</th>
                    @if(!auth()->user()->isUsuario())
                        <th>Solicitantes do Chamado</th>
                    @endif
                    <th>Atribuídos ao Chamado</th>
                    <th>Abertura</th>
                    <th>Última atualização</th>
                </tr>
            </thead>
            <tbody>
                @forelse($chamados as $chamado)
                    <tr>
                        <td class="border text-nowrap">{{ $chamado->id }}</td>
                        <td class="border"><a href="{{ auth()->user()->perfil_id == Perfil::USUARIO ? route('chamados.show', $chamado) : route('chamados.edit', $chamado) }}">{{ $chamado->titulo }}</a></td>
                        <td class="border text-nowrap">{{ Status::DESCRICAO[$chamado->status] }}</td>
                        <td class="border text-nowrap">{{ Urgencia::DESCRICAO[$chamado->urgencia] }}</td>
                        @if(!auth()->user()->isUsuario())
                            <td>
                                @foreach($chamado->solicitantes as $solicitante)
                                    @if(!$loop->last)
                                        {{ $solicitante->usuario->name }},
                                    @else
                                        {{ $solicitante->usuario->name }}
                                    @endif
                                @endforeach
                            </td>
                        @endif
                        <td>
                            @foreach($chamado->atribuidos as $atribuido)
                                @if(!$loop->last)
                                    {{ $atribuido->usuario->name }},
                                @else
                                    {{ $atribuido->usuario->name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="border text-nowrap">{{ $chamado->updated_at ? $chamado->updated_at->format('d/m/Y H:m') : '' }}</td>
                        <td class="border text-nowrap">{{ $chamado->created_at ? $chamado->created_at->format('d/m/Y H:m') : '' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="99" class="text-center">Nenhum chamado foi localizado</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="99" class="border-0">
                        <div class="d-flex pt-3">
                            <div class="d-flex gap-3 ms-auto">
                                <span>Exibindo: {{ $chamados->firstItem() }} a {{ $chamados->lastItem() }}</span><span>Total de Registros: {{ $chamados->total() }}</span>
                            </div>
                            <span class="ms-auto">{{ $chamados->appends(request()->except('page'))->links() }}</span>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>  
</x-layout>