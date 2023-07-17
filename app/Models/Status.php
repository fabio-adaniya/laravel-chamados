<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const aberto = 1;
    const em_andamento = 2;
    const solucionado = 3;
    const excluido = 4;

    const descricao = ['', 'Aberto', 'Em andamento', 'Solucionado', 'Excluído'];
}
