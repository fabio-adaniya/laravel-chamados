@section('title', 'Login - '.config('app.name'))

@push('script')
    <script>
        $(document).ready(function(){
            emailUsuario();
        });

        function emailUsuario()
        {
            if($("#radio-username").is(":checked"))
            {
                $("#div-username").show();
                $("#input-username").prop("disabled", false);

                $("#div-email").hide();
                $("#input-email").prop("disabled", true);
            }
            else
            {
                $("#div-username").hide();
                $("#input-username").prop("disabled", true);

                $("#div-email").show();
                $("#input-email").prop("disabled", false);
            }
        }

        $("#radio-username").click(function(){
            emailUsuario();
        });

        $("#radio-email").click(function(){
            emailUsuario();
        });
    </script>
@endpush

<x-layout>
    <div class="d-flex justify-content-center vh-100 align-items-center">
        <div class="card" style="width: 500px">
            <div class="card-body">
                <form action="{{ route('login.validar') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-center mb-3">{{ config('app.name') }}</div>
                    <div class="d-flex justify-content-center fw-bold mb-3">Login</div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio-username" checked/>
                                <label class="form-check-label" for="radio-username">Usuário</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio-email"/>
                                <label class="form-check-label" for="radio-email">E-mail</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" id="div-username">
                        <label for="input-username" class="form-label">Usuário</label>
                        <input type="text" id="input-username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"/>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3" id="div-email">
                        <label for="input-email" class="form-label">E-mail</label>
                        <input type="text" id="input-email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-password" class="form-label">Senha</label>
                        <input type="password" id="input-password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"/>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary ms-auto">
                            <i class="fa-solid fa-right-to-bracket"></i> Acessar
                        </button>
                    </div>
                    @error('login')
                        <div class="d-flex justify-content-center">
                            <span class="text-danger fw-bold">{{ $message }}</span>
                        </div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</x-layout>