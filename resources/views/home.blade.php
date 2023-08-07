@section('title', 'Página inicial')

<x-layout>
    <x-menu/>
    <div class="d-flex">
        <div class="card m-3" style="width: 500px">
            <div class="card-header text-center bg-primary bg-opacity-10">
                Meus chamados - Status
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex flex-wrap">
                        {{ Status::DESCRICAO[Status::ABERTO] }}
                        <span class="badge bg-secondary ms-auto">{{ auth()->user()->chamados(Status::ABERTO)->count() }}</span>
                    </li>
                    <li class="list-group-item d-flex flex-wrap">
                        {{ Status::DESCRICAO[Status::EM_ANDAMENTO] }}
                        <span class="badge bg-secondary ms-auto">{{ auth()->user()->chamados(Status::EM_ANDAMENTO)->count() }}</span>
                    </li>
                    <li class="list-group-item d-flex flex-wrap">
                        {{ Status::DESCRICAO[Status::SOLUCIONADO] }}
                        <span class="badge bg-secondary ms-auto">{{ auth()->user()->chamados(Status::SOLUCIONADO)->count() }}</span>
                    </li>
                    <li class="list-group-item d-flex flex-wrap">
                        {{ Status::DESCRICAO[Status::EXCLUIDO] }}
                        <span class="badge bg-secondary ms-auto">{{ auth()->user()->chamados(Status::EXCLUIDO)->count() }}</span>
                    </li>   
                </ul>
            </div>
        </div>
    </div>
</x-layout>