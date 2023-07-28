<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChamadoSolicitante;
use App\Models\ChamadoAtribuido;

class Chamado extends Model
{
    use HasFactory;

    protected $table = 'chamados';
    protected $fillable = ['titulo', 'descricao', 'status', 'urgencia', 'urgencia_justificativa'];

    public function solicitantes()
    {
        return $this->hasMany(ChamadoSolicitante::class, 'chamado_id', 'id');
    }

    public function atribuidos()
    {
        return $this->hasMany(ChamadoAtribuido::class, 'chamado_id', 'id');
    }
}
