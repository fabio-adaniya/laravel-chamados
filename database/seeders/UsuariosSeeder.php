<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => '123',
            'perfil_id' => '1',
        ]);

        User::create([
            'name' => 'Técnico',
            'username' => 'tecnico',
            'email' => 'tecnico@email.com',
            'password' => '123',
            'perfil_id' => '2',
        ]);

        User::create([
            'name' => 'Usuário',
            'username' => 'user',
            'email' => 'user@email.com',
            'password' => '123',
            'perfil_id' => '3'
        ]);
    }
}
