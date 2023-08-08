<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    const ADMINISTRADOR = 1;
    const TECNICO = 2;
    const USUARIO = 3;

    const DESCRICAO = ['', 'Administrador', 'Técnico', 'Usuário'];
}
