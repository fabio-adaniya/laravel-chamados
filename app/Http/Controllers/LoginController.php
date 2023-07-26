<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function validar(Request $request)
    {
        if(isset($request->email))
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $autenticacao = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        }
        else
        {
            $request->validate([
                'username' => 'required', 
                'password' => 'required'
            ]);

            $autenticacao = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        }

        if($autenticacao)
        {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'login' => 'Login inválido!'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
