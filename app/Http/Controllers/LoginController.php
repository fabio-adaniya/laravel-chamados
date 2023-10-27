<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function validar(Request $request)
    {
        $request->validate([
            'username_email' => 'required',
            'password' => 'required'
        ]);

        $autenticacao = Auth::attempt(['username' => $request->username_email, 'password' => $request->password, 'ativo' => true]);

        if(!$autenticacao)
            $autenticacao = Auth::attempt(['email' => $request->username_email, 'password' => $request->password, 'ativo' => true]);

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
