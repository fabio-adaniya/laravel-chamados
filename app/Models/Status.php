<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const ABERTO = 1;
    const EM_ANDAMENTO = 2;
    const SOLUCIONADO = 3;
    const EXCLUIDO = 4;

    const DESCRICAO = ['', 'Aberto', 'Em andamento', 'Solucionado', 'Excluído'];
}
