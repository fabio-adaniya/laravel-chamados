@section('title', 'Consultar Usuários')

<x-layout>
    <x-menu/>
    <div class="table-responsive m-3">
        <table class="table table-sm table-hover">
            <thead class="blue-gray text-white">
                <tr>
                    <th scope="col">ID</th>
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
                        <td>{{ $user->id }}</td>
                        <td>
                            @can('acesso-pessoal', $user)
                                <a href="{{ route('users.show', $user) }}" class="link-opacity-10-hover">{{ $user->name }}</a>
                            @else
                                <span>{{ $user->name }}</span>
                            @endcan
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
                {{ $users->links() }}
            </tbody>
        </table>
    </div>
</x-layout>