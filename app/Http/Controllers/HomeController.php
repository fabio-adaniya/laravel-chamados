<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\Status;
use App\Models\Urgencia;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        if(auth()->user()->isUsuario())
        {
            $chamados_status = [
                'ABERTO' => auth()->user()->chamados(Status::ABERTO)->count(),
                'EM_ANDAMENTO' => auth()->user()->chamados(Status::EM_ANDAMENTO)->count(),
                'SOLUCIONADO' => auth()->user()->chamados(Status::SOLUCIONADO)->count(),
            ];

            $chamados_urgencia = [
                'BAIXA' => auth()->user()->chamados(null, Urgencia::BAIXA)->count(),
                'MEDIA' => auth()->user()->chamados(null, Urgencia::MEDIA)->count(),
                'ALTA' => auth()->user()->chamados(null, Urgencia::ALTA)->count(),
            ];
        }
        else
        {
            $chamados_status = [
                'ABERTO' => Chamado::where('status', Status::ABERTO)->count(),
                'EM_ANDAMENTO' => Chamado::where('status', Status::EM_ANDAMENTO)->count(),
                'SOLUCIONADO' => Chamado::where('status', Status::SOLUCIONADO)->count(),
            ];

            $chamados_urgencia = [
                'BAIXA' => Chamado::where('urgencia', Urgencia::BAIXA)->count(),
                'MEDIA' => Chamado::where('urgencia', Urgencia::MEDIA)->count(),
                'ALTA' => Chamado::where('urgencia', Urgencia::ALTA)->count(),
            ];
        }
    
        return view('home', ['chamados_status' => $chamados_status, 'chamados_urgencia' => $chamados_urgencia]);
    }
}
