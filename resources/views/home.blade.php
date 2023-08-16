@section('title', 'Página inicial')

<x-layout>
    <x-menu/>
    <div class="d-flex flex-wrap">
        <div class="card m-3" style="width: 500px">
            <div class="card-header text-center teal text-white">
                Chamados - Status
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <td class="w-100">{{ Status::DESCRICAO[Status::ABERTO] }}</td>
                            <td><span class="badge teal ms-auto">{{ $chamados_status['ABERTO'] }}</span></td>
                        </tr>
                        <tr>
                            <td class="w-100">{{ Status::DESCRICAO[Status::EM_ANDAMENTO] }}</td>
                            <td><span class="badge teal ms-auto">{{ $chamados_status['EM_ANDAMENTO'] }}</span></td>
                        </tr>
                        <tr>
                            <td class="w-100">{{ Status::DESCRICAO[Status::SOLUCIONADO] }}</td>
                            <td><span class="badge teal ms-auto">{{ $chamados_status['SOLUCIONADO'] }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card m-3" style="width: 500px">
            <div class="card-header text-center teal text-white">
                Chamados - Urgência
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <td class="w-100">{{ Urgencia::DESCRICAO[Urgencia::BAIXA] }}</td>
                            <td><span class="badge teal ms-auto">{{ $chamados_urgencia['BAIXA'] }}</span></td>
                        </tr>
                        <tr>
                            <td class="w-100">{{ Urgencia::DESCRICAO[Urgencia::MEDIA] }}</td>
                            <td><span class="badge teal ms-auto">{{ $chamados_urgencia['MEDIA'] }}</span></td>
                        </tr>
                        <tr>
                            <td class="w-100">{{ Urgencia::DESCRICAO[Urgencia::ALTA] }}</td>
                            <td><span class="badge teal ms-auto">{{ $chamados_urgencia['ALTA'] }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>