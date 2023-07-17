<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urgencia extends Model
{
    use HasFactory;

    const baixa = 1;
    const media = 2;
    const alta = 3;

    const descricao = ['', 'Baixa', 'Média', 'Alta'];
}
