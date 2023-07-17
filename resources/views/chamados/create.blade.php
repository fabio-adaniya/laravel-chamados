<x-layout>
    <div class="d-flex justify-content-center">
        <div class="card m-3" style="width: 500px">
            <div class="card-body">
                <form action="{{ route('chamados.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo-input" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo-input" class="form-control @error('titulo') is-invalid @enderror" autofocus/>
                        @error('titulo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descricao-input" class="form-label">Descrição</label>
                        <input type="text" name="descricao" id="descricao-input" class="form-control @error('descricao') is-invalid @enderror">
                        @error('descricao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status-input" class="form-label">Status</label>
                        <select name="status" id="status-input" class="form-select @error('status') is-invalid @enderror">
                            <option value="{{ $status_aberto }}">{{ $status_descricao[$status_aberto] }}</option>
                            <option value="{{ $status_em_andamento }}">{{ $status_descricao[$status_em_andamento] }}</option>
                            <option value="{{ $status_solucionado }}">{{ $status_descricao[$status_solucionado] }}</option>
                            <option value="{{ $status_excluido }}">{{ $status_descricao[$status_excluido] }}</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="urgencia-input" class="form-label">Urgência</label>
                        <select name="urgencia" id="urgencia-input" class="form-select @error('urgencia') is-invalid @enderror">
                            <option value="{{ $urgencia_baixa }}">{{ $urgencia_descricao[$urgencia_baixa] }}</option>
                            <option value="{{ $urgencia_media }}">{{ $urgencia_descricao[$urgencia_media] }}</option>
                            <option value="{{ $urgencia_alta }}">{{ $urgencia_descricao[$urgencia_alta] }}</option>
                        </select>
                        @error('urgencia')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary ms-auto">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>