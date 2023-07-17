<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\Status;
use App\Models\Urgencia;
use App\Models\User;

class ChamadoController extends Controller
{
    public function index()
    {
        $chamados = auth()->user()->meusChamados();
        return view('chamados.index', ['chamados' => $chamados]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'status' => 'required',
            'urgencia' => 'required',
        ]);

        Chamado::create($validated);

        return redirect()->route('home');
    }

    public function create()
    {
        $status = new Status;
        $urgencia = new Urgencia;

        return view('chamados.create',
            ['status_aberto' => $status::aberto, 
            'status_em_andamento' => $status::em_andamento,
            'status_solucionado' => $status::solucionado,
            'status_excluido' => $status::excluido,
            'status_descricao' => $status::descricao,
            'urgencia_baixa' => $urgencia::baixa,
            'urgencia_media' => $urgencia::media,
            'urgencia_alta' => $urgencia::alta,
            'urgencia_descricao' => $urgencia::descricao,
        ]);
    }

    public function show(Chamado $chamado)
    {
        return view('chamados.show');
    }

    public function update(Chamado $chamado)
    {
        return redirect()->route('home');
    }

    public function destroy(Chamado $chamado)
    {
        return redirect()->route('home');
    }

    public function edit(Chamado $chamado)
    {
        return view('chamados.edit');
    }
}
