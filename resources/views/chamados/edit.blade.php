@section('title', 'Editar chamado - '.$chamado->id)

@push('script')
    <script>
        let url_base = window.location.origin;
        let url_busca = url_base+'/atribuido';

        let url_completa = window.location.href;
        url_completa = url_completa.split('/');
        let chamado_id = url_completa[4];

        $(document).ready(function(){
            $.ajax({
                method: "GET",
                url: url_busca,
                async: false,
                data: { chamado: chamado_id },
                success: function(itens){
                    for(item of itens)
                    {
                        let jsonAtribuido = JSON.parse(item);
                        $(".chosen").append($('<option>', {
                            value: jsonAtribuido.id,
                            text: jsonAtribuido.name,
                            selected: jsonAtribuido.selected,
                        }));
                    }
                }
            });

            $(".chosen").chosen();
        });
    </script>
@endpush

@push('style')
    <style>
        .list-group-item{
            background-color: #e9ecef;
            opacity: 1;
        }

        .chosen{
            width: 100% !important;
        }
    </style>
@endpush

<x-layout>
    <x-menu/>
    <h3 class="text-center mt-3">Editar chamado - {{ $chamado->id }}</h3>
    <div class="d-flex flex-wrap m-3">
        <div class="card border-0" style="width: 250px">
            <div class="card-body">
                <form action="{{ route('chamados.update', $chamado) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="status-input" class="form-select @error('status') is-invalid @enderror">
                            @if(old('status', $chamado->status))
                                <option value="{{ Status::ABERTO }}" @if(old('status', $chamado->status) == Status::ABERTO) selected @endif>{{ Status::DESCRICAO[Status::ABERTO] }}</option>
                                <option value="{{ Status::EM_ANDAMENTO }}" @if(old('status', $chamado->status) == Status::EM_ANDAMENTO) selected @endif>{{ Status::DESCRICAO[Status::EM_ANDAMENTO] }}</option>
                                <option value="{{ Status::SOLUCIONADO }}" @if(old('status', $chamado->status) == Status::SOLUCIONADO) selected @endif>{{ Status::DESCRICAO[Status::SOLUCIONADO] }}</option>
                                <option value="{{ Status::EXCLUIDO }}" @if(old('status', $chamado->status) == Status::EXCLUIDO) selected @endif>{{ Status::DESCRICAO[Status::EXCLUIDO] }}</option>
                            @else
                                <option value="{{ Status::ABERTO }}">{{ Status::DESCRICAO[Status::ABERTO] }}</option>
                                <option value="{{ Status::EM_ANDAMENTO }}">{{ Status::DESCRICAO[Status::EM_ANDAMENTO] }}</option>
                                <option value="{{ Status::SOLUCIONADO }}">{{ Status::DESCRICAO[Status::SOLUCIONADO] }}</option>
                                <option value="{{ Status::EXCLUIDO }}">{{ Status::DESCRICAO[Status::EXCLUIDO] }}</option>
                            @endif
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Urgência</label>
                        <select name="urgencia" id="urgencia-input" class="form-select @error('urgencia') is-invalid @enderror">
                            @if(old('urgencia', $chamado->urgencia))
                                <option value="{{ Urgencia::BAIXA }}" @if(old('urgencia', $chamado->urgencia) == Urgencia::BAIXA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::BAIXA] }}</option>
                                <option value="{{ Urgencia::MEDIA }}" @if(old('urgencia', $chamado->urgencia) == Urgencia::MEDIA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::MEDIA] }}</option>
                                <option value="{{ Urgencia::ALTA }}" @if(old('urgencia', $chamado->urgencia) == Urgencia::ALTA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::ALTA] }}</option>
                            @else
                                <option value="{{ Urgencia::BAIXA }}">{{ Urgencia::DESCRICAO[Urgencia::BAIXA] }}</option>
                                <option value="{{ Urgencia::MEDIA }}" selected>{{ Urgencia::DESCRICAO[Urgencia::MEDIA] }}</option>
                                <option value="{{ Urgencia::ALTA }}">{{ Urgencia::DESCRICAO[Urgencia::ALTA] }}</option>
                            @endif
                        </select>
                        @error('urgencia')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quem está atribuído a este chamado?</label>
                        <div class="d-flex">
                            <select name="atribuidos[]" class="form-control chosen @error('atribuidos') is-invalid @enderror" multiple="true" data-placeholder="Selecione os atribuídos" style="width: 450px">
                            </select>
                        </div>
                        @error('atribuidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary btn-sm ms-auto mb-3">Salvar</button>
                    </div>
                </form>
                <div class="mb-3">
                    <label class="form-label">Abertura</label>
                    <input type="text" class="form-control" value="{{ $chamado->created_at ? $chamado->created_at->format('d/m/Y H:m') : '' }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Última atualização</label>
                    <input type="text" class="form-control" value="{{ $chamado->updated_at ? $chamado->updated_at->format('d/m/Y H:m') : '' }}" disabled>
                </div>
                <label class="form-label">Solicitantes do chamado</label>
                <ul class="list-group">
                    @foreach($chamado->solicitantes as $solicitante)
                        <li class="list-group-item">{{ $solicitante->usuario->name }}</li>
                    @endforeach
                </ul>
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