<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urgencia extends Model
{
    use HasFactory;

    const BAIXA = 1;
    const MEDIA = 2;
    const ALTA = 3;

    const DESCRICAO = ['', 'Baixa', 'Média', 'Alta'];
}
