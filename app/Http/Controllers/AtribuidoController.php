<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chamado;

class AtribuidoController extends Controller
{
    public function buscar(Request $request)
    {
        $items = [];

        $users = $this->buscarTodosUsuarios();
        
        $atribuidos = $this->buscarUsuariosAtribuidosAoChamado($request->chamado);

        foreach($users as $user)
        {
            $selected = $this->verificarUsuarioAtribuidoAoChamado($atribuidos, $user);

            $items[] = '{"id":'.$user->id.',"name":"'.$user->name.'"'.$selected.'}';
        }

        return $items;
    }

    public function buscarTodosUsuarios()
    {
        $users = User::whereNotNull('id');
        return $users = $users->get();
    }

    public function buscarUsuariosAtribuidosAoChamado($chamado_id)
    {
        $atribuidos = null;

        if($chamado_id)
        {
            $chamado = Chamado::find($chamado_id);
            $atribuidos = $chamado->atribuidos;
        }

        return $atribuidos;
    }

    public function verificarUsuarioAtribuidoAoChamado($atribuidos, $user)
    {
        $selecionar = false;

        if($atribuidos)
        {
            foreach($atribuidos as $atribuido)
            {
                if($atribuido->user_id == $user->id)
                {
                    $selecionar = true;
                    break;
                }
            }
        }

        $selected = ',"selected":';

        if($selecionar)
            $selected = $selected.'true';
        else
            $selected = $selected.'false';

        return $selected;
    }
}
