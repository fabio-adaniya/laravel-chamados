@section('title', 'Editar usuário - '.$user->id)

<x-layout>
    <x-menu/>
    <div class="d-flex justify-content-center">
        <div class="card m-3" style="width: 500px">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-header text-center teal text-white">
                    Editar usuário - {{ $user->id }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ativo</label>
                        <select name="ativo" class="form-select @error('ativo') is-invalid @enderror" required>
                            @if(old('ativo', $user->ativo))
                                <option value="1" selected>Sim</option>
                                <option value="0">Não</option>
                            @else
                                <option value="1">Sim</option>
                                <option value="0" selected>Não</option>
                            @endif
                        </select>
                        @error('ativo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer teal d-flex">
                    <button type="submit" class="btn btn-outline-primary btn-sm ms-auto border-white text-white">
                        <i class="fa-regular fa-floppy-disk"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>