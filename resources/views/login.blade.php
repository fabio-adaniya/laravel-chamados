@section('title', 'Login - '.config('app.name'))

<x-layout>
    <div class="d-flex justify-content-center vh-100 align-items-center bg-light">
        <div>
            <div class="card m-3" style="width: 500px">
                <div class="card-body p-5">
                    <form action="{{ route('login.validar') }}" method="POST">
                        @csrf
                        <h4 class="d-flex justify-content-center mb-3">{{ config('app.name') }}</h4>
                        <hr>
                        <div class="mb-3">
                            <label for="input-username_email" class="form-label">Usuário/E-mail</label>
                            <input type="text" id="input-username_email" name="username_email" class="form-control @error('username_email') is-invalid @enderror" value="{{ old('username_email') }}"/>
                            @error('username_email')
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
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </div>
                        @error('login')
                            <div class="d-flex justify-content-center mt-3">
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            </div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>