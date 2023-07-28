@section('title', 'Chamado - '.$chamado->id)

@push('style')
    <style>
        .list-group-item{
            background-color: #e9ecef;
            opacity: 1;
        }
    </style>
@endpush

<x-layout>
    <x-menu/>
    <h3 class="text-center mt-3">Chamado - {{ $chamado->id }}</h3>
    <div class="d-flex flex-wrap m-3">
        <div class="card border-0" style="width: 250px">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" value="{{ Status::DESCRICAO[$chamado->status] }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Urgência</label>
                    <input type="text" class="form-control" value="{{ Status::DESCRICAO[$chamado->urgencia] }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Abertura</label>
                    <input type="text" class="form-control" value="{{ $chamado->created_at ? $chamado->created_at->format('d/m/Y H:m') : '' }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Última atualização</label>
                    <input type="text" class="form-control" value="{{ $chamado->updated_at ? $chamado->updated_at->format('d/m/Y H:m') : '' }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Solicitantes do chamado</label>
                    <ul class="list-group">
                        @foreach($chamado->solicitantes as $solicitante)
                            <li class="list-group-item">{{ $solicitante->usuario->name }}</li>
                        @endforeach
                    </ul>
                </div>
                @if($chamado->atribuidos->count() > 0)
                    <label class="form-label">Atribuídos ao chamado</label>
                    <ul class="list-group">
                        @foreach($chamado->atribuidos as $atribuido)
                            <li class="list-group-item">{{ $atribuido->usuario->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="card border-0 flex-fill">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" value="{{ $chamado->titulo }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea type="text" class="form-control" disabled style="height: 100px">{{ $chamado->descricao }}</textarea>
                </div>
                <label class="form-label">Justificativa da urgência</label>
                <textarea class="form-control" disabled style="height: 100px">{{ $chamado->urgencia_justificativa }}</textarea>
            </div>
        </div>
    </div>
</x-layout>