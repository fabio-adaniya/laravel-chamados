<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\User;
use App\Models\ChamadoSolicitante;
use App\Models\Status;
use App\Models\Urgencia;
use App\Models\Perfil;
use App\Models\ChamadoAtribuido;

class ChamadoController extends Controller
{
    public function index(Request $request)
    {    
        if(auth()->user()->perfil_id != Perfil::USUARIO)
        {
            if(isset($request->meus_chamados) && ($request->meus_chamados))
                $chamados = auth()->user()->chamados();
            else
                $chamados = Chamado::whereNotNull('id');
        }
        else
            $chamados = auth()->user()->chamados();

        if($request->status)
            $chamados->where('status', $request->status);
        if($request->urgencia)
            $chamados->where('urgencia', $request->urgencia);

        $registros_por_pagina = 15;

        if($request->registros_por_pagina)
            $registros_por_pagina = $request->registros_por_pagina;

        $chamados = $chamados->paginate($registros_por_pagina);

        return view('chamados.index', ['chamados' => $chamados]);
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'urgencia' => 'required',
            'solicitantes' => 'required',
            'urgencia_justificativa' => 'required_if:urgencia,==,'.Urgencia::ALTA,
        ]);

        $chamado = $this->criarChamado($validated);

        $this->criarSolicitantesDoChamado($request, $chamado);

        return redirect()->route('chamados.index');
    }

    public function criarChamado($validated)
    {
        $validated['status'] = Status::ABERTO;
        return Chamado::create($validated);
    }

    public function criarSolicitantesDoChamado(Request $request, $chamado)
    {
        foreach($request->solicitantes as $solicitante)
        {
            ChamadoSolicitante::create([
                'user_id' => $solicitante,
                'chamado_id' => $chamado->id,
            ]);
        }
    }

    public function create()
    {
        return view('chamados.create');
    }

    public function show(Chamado $chamado)
    {
        $this->authorize('perfil-usuario');

        return view('chamados.show', ['chamado' => $chamado]);
    }

    public function edit(Chamado $chamado)
    {
        $this->authorize('perfil-tecnico');
        
        return view('chamados.edit', ['chamado' => $chamado]);
    }

    public function update(Request $request, Chamado $chamado)
    {
        $validated = $request->validate([
            'status' => 'required',
            'urgencia' => 'required',
            'atribuidos' => 'nullable',
        ]);

        $chamado->fill($validated);
        $chamado->save();

        $this->criarAtribuidosDoChamado($request, $chamado->id);

        return redirect()->route('chamados.index');
    }

    public function deletarAtribuidosDoChamado($chamado)
    {
        $chamado = ChamadoAtribuido::where('chamado_id', $chamado); 
        $chamado->delete();
    }

    public function criarAtribuidosDoChamado(Request $request, $chamado)
    {
        $this->deletarAtribuidosDoChamado($chamado);       

        if($request->atribuidos)
            foreach($request->atribuidos as $atribuido)
                ChamadoAtribuido::create([
                    'user_id' => $atribuido,
                    'chamado_id' => $chamado,
                ]);
    }

    public function destroy(Chamado $chamado)
    {
        return redirect()->route('home');
    }
}
