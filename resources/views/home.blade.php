@section('title', 'Página inicial')

<x-layout>
    <x-menu/>
    @if(auth()->user()->isUsuario())
        <div class="d-flex flex-wrap">
            <div class="card m-3" style="width: 500px">
                <div class="card-header text-center teal text-white">
                    Meus Chamados - Status
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td class="w-100">{{ Status::DESCRICAO[Status::ABERTO] }}</td>
                                <td><span class="badge teal ms-auto">{{ auth()->user()->chamados(Status::ABERTO)->count() }}</span></td>
                            </tr>
                            <tr>
                                <td class="w-100">{{ Status::DESCRICAO[Status::EM_ANDAMENTO] }}</td>
                                <td><span class="badge teal ms-auto">{{ auth()->user()->chamados(Status::EM_ANDAMENTO)->count() }}</span></td>
                            </tr>
                            <tr>
                                <td class="w-100">{{ Status::DESCRICAO[Status::SOLUCIONADO] }}</td>
                                <td><span class="badge teal ms-auto">{{ auth()->user()->chamados(Status::SOLUCIONADO)->count() }}</span></td>
                            </tr>
                            <tr>
                                <td class="w-100">{{ Status::DESCRICAO[Status::EXCLUIDO] }}</td>
                                <td><span class="badge teal ms-auto">{{ auth()->user()->chamados(Status::EXCLUIDO)->count() }}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card m-3" style="width: 500px">
                <div class="card-header text-center teal text-white">
                    Meus Chamados - Urgência
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td class="w-100">{{ Urgencia::DESCRICAO[Urgencia::BAIXA] }}</td>
                                <td><span class="badge teal ms-auto">{{ auth()->user()->chamados(null, Urgencia::BAIXA)->count() }}</span></td>
                            </tr>
                            <tr>
                                <td class="w-100">{{ Urgencia::DESCRICAO[Urgencia::MEDIA] }}</td>
                                <td><span class="badge teal ms-auto">{{ auth()->user()->chamados(null, Urgencia::MEDIA)->count() }}</span></td>
                            </tr>
                            <tr>
                                <td class="w-100">{{ Urgencia::DESCRICAO[Urgencia::ALTA] }}</td>
                                <td><span class="badge teal ms-auto">{{ auth()->user()->chamados(null, Urgencia::ALTA)->count() }}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-layout>