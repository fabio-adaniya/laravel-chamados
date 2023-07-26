<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChamadoSolicitante;

class Chamado extends Model
{
    use HasFactory;

    protected $table = 'chamados';
    protected $fillable = ['titulo', 'descricao', 'status', 'urgencia'];

    public function solicitantes()
    {
        return $this->hasMany(ChamadoSolicitante::class, 'chamado_id', 'id');
    }
}
