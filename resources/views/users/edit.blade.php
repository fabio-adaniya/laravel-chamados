@section('title', 'Editar usuário - '.$user->id)

<x-layout>
    <x-menu/>
    <div class="d-flex justify-content-center">
        <div class="card m-3" style="width: 500px">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-header text-center blue-gray text-white">
                    Editar usuário - {{ $user->id }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="input-name" class="form-label">Nome <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="name" id="input-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Usuário <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="username" id="input-username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">E-mail <span class="text-danger fw-bold">*</span></label>
                        <input type="email" name="email" id="input-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="select-ativo" class="form-label">Ativo <span class="text-danger fw-bold">*</span></label>
                        <select name="ativo" id="select-ativo" class="form-select @error('ativo') is-invalid @enderror" required>
                            <option value="1" @if(old('ativo', $user->ativo) == '1') selected @endif>Sim</option>
                            <option value="0" @if(old('ativo', $user->ativo) == '0') selected @endif>Não</option>
                        </select>
                        @error('ativo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="select-perfil_id" class="form-label">Perfil <span class="text-danger fw-bold">*</span></label>
                        <select name="perfil_id" id="select-perfil_id" class="form-select @error('perfil_id') is-invalid @enderror" required>
                            <option value="{{ Perfil::ADMINISTRADOR }}" @if(old('perfil_id', $user->perfil_id) == Perfil::ADMINISTRADOR) selected @endif>{{ Perfil::DESCRICAO[Perfil::ADMINISTRADOR] }}</option>
                            <option value="{{ Perfil::TECNICO }}" @if(old('perfil_id', $user->perfil_id) == Perfil::TECNICO) selected @endif>{{ Perfil::DESCRICAO[Perfil::TECNICO] }}</option>
                            <option value="{{ Perfil::USUARIO }}" @if(old('perfil_id', $user->perfil_id) == Perfil::USUARIO) selected @endif>{{ Perfil::DESCRICAO[Perfil::USUARIO] }}</option>
                        </select>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary btn-sm ms-auto">
                            <i class="fa-regular fa-floppy-disk"></i> Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>