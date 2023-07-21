<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SolicitanteController extends Controller
{
    public function buscar(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'.$request->solicitante.'%')->limit(5)->get();
        
        $items = [];

        foreach($users as $user)
            $items[] = '{"id":'.$user->id.',"name":"'.$user->name.'"}';

        return $items;
    }
}
