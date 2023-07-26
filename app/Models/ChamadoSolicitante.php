<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chamado;

class ChamadoSolicitante extends Model
{
    use HasFactory;

    protected $table = 'chamados_solicitantes';
    protected $fillable = ['user_id', 'chamado_id'];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class, 'chamado_id', 'id');
    }
}
