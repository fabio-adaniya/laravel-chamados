<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('perfil-tecnico');

        $users = User::whereNotNull('id')->paginate();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        $this->authorize('perfil-tecnico');

        return view('users.create');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ativo' => 'required',
        ]);

        $user->fill($validated);
        $user->update();

        return redirect()->route('users.show', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $this->authorize('perfil-tecnico');

        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'perfil_id' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        User::create($validated);

        return redirect()->route('users.index');
    }
}
