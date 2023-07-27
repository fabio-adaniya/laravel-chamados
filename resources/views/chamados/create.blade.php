@section('title', 'Criar chamado')

@push('script')
    <script>
        let url_base = window.location.origin;
        let url_busca = url_base+'/solicitante';

        $(document).ready(function(){
            $.ajax({
                method: "GET",
                url: url_busca,
                async: false,
                success: function(itens){
                    for(item of itens)
                    {
                        let jsonSolicitante = JSON.parse(item);
                        $(".chosen").append($('<option>', {
                            value: jsonSolicitante.id,
                            text: jsonSolicitante.name,
                        }));
                    }
                }
            });

            $(".chosen").chosen();

            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        });
    </script>
@endpush

@push('style')
    <style>
        .chosen{
            width: 100% !important;
        }
    </style>
@endpush

<x-layout>
    <x-menu/>
    <div class="d-flex justify-content-center">
        <div class="card m-3" style="width: 500px">
        <form action="{{ route('chamados.store') }}" method="POST">
            @csrf
            <div class="card-header text-center">
                Criar chamado
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="titulo-input" class="form-label">Título</label>
                    <input type="text" name="titulo" id="titulo-input" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" autofocus/>
                    @error('titulo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descricao-input" class="form-label">Descrição</label>
                    <textarea id="descricao-input" name="descricao" style="height: 100px" class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="urgencia-input" class="form-label">Urgência</label>
                    <select name="urgencia" id="urgencia-input" class="form-select @error('urgencia') is-invalid @enderror">
                        @if(old('urgencia'))
                            <option value="{{ Urgencia::BAIXA }}" @if(old('urgencia') == Urgencia::BAIXA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::BAIXA] }}</option>
                            <option value="{{ Urgencia::MEDIA }}" @if(old('urgencia') == Urgencia::MEDIA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::MEDIA] }}</option>
                            <option value="{{ Urgencia::ALTA }}" @if(old('urgencia') == Urgencia::ALTA) selected @endif>{{ Urgencia::DESCRICAO[Urgencia::ALTA] }}</option>
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
                <div class="mb-3" id="urgencia_justificativa-div">
                    <label for="urgencia_justificativa-textarea" class="form-label">Justifique a urgência</label>
                    <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="É obrigatório preencher este campo apenas ao selecionar a opção '{{ Urgencia::DESCRICAO[Urgencia::ALTA] }}' no campo de Urgência">
                        <i class="fa-solid fa-circle-info"></i>
                    </span>
                    <textarea name="urgencia_justificativa" id="urgencia_justificativa-textarea" class="form-control @error('urgencia_justificativa') is-invalid @enderror" style="height: 100px"></textarea>
                    @error('urgencia_justificativa')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quem está solicitando este chamado?</label>
                    <div class="d-flex">
                        <select name="solicitantes[]" class="form-control chosen @error('solicitantes') is-invalid @enderror" multiple="true" data-placeholder="Selecione os solicitantes" style="width: 450px">
                        </select>
                    </div>
                    @error('solicitantes')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary btn-sm ms-auto">
                        <i class="fa-solid fa-plus me-1"></i>Enviar chamado
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>