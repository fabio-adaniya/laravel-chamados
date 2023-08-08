@section('title', 'Consultar Usuários')

<x-layout>
    <x-menu/>
    <div class="table-responsive m-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ativo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="link-opacity-10-hover">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Perfil::DESCRICAO[$user->perfil_id] }}</td>
                        <td>{{ $user->ativo ? 'Sim' : 'Não' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="99"></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>