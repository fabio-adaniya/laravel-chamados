<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SolicitanteController extends Controller
{
    public function buscar(Request $request)
    {
        if($request)
            $users = User::where('name', 'LIKE', '%'.$request->solicitante.'%');
        else
            $users = User::whereNotNull('id');

        $users = $users->get();
        
        $items = [];

        foreach($users as $user)
            $items[] = '{"id":'.$user->id.',"name":"'.$user->name.'"}';

        return $items;
    }
}
