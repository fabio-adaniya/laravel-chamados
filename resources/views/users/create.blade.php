@section('title', 'Cadastrar Usuário')

@push('script')
    <script>
        $('[name=btn_eye]').click(function(){
            let divGroup = $(this).parent();
            let input = $(divGroup).find('input');
            $(this).empty();

            if($(input).prop('type') == 'password')
            {
                $(input).prop('type', 'text');
                $(this).append('<i class="fa-solid fa-eye-slash"></i>');
            }
            else
            {
                $(input).prop('type', 'password');
                $(this).append('<i class="fa-solid fa-eye"></i>');
            }
        });
    </script>
@endpush

<x-layout>
    <x-menu/>
    <div class="d-flex justify-content-center">
        <div class="card m-3" style="width: 500px">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="card-header text-center text-white teal">
                    Cadastrar Usuário
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="input-name" class="form-label">Nome <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="name" id="input-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-username" class="form-label">Usuário <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="username" id="input-username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-email" class="form-label">E-mail <span class="text-danger fw-bold">*</span></label>
                        <input type="email" name="email" id="input-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="select-perfil_id" class="form-label">Perfil <span class="text-danger fw-bold">*</span></label>
                        <select name="perfil_id" id="select-perfil_id" class="form-select @error('perfil_id') is-invalid @enderror">
                            <option value="{{ Perfil::USUARIO }}" selected>{{ Perfil::DESCRICAO[Perfil::USUARIO] }}</option>
                            <option value="{{ Perfil::TECNICO }}">{{ Perfil::DESCRICAO[Perfil::TECNICO] }}</option>
                            <option value="{{ Perfil::ADMINISTRADOR }}">{{ Perfil::DESCRICAO[Perfil::ADMINISTRADOR] }}</option>
                        </select>
                        @error('perfil_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-password" class="form-label">Senha <span class="text-danger fw-bold">*</span></label>
                        <div class="input-group">
                            <input type="password" name="password" id="input-password" class="form-control @error('password') is-invalid @enderror" required>
                            <button type="button" name="btn_eye" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-password_confirmation" class="form-label">Confirme a senha <span class="text-danger fw-bold">*</span></label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="input-password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                            <button type="button" name="btn_eye" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer teal d-flex">
                    <button type="submit" class="btn btn-outline-primary btn-sm text-white border-white ms-auto">
                        <i class="fa-regular fa-floppy-disk"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>