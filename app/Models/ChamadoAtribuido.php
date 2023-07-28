<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChamadoAtribuido extends Model
{
    use HasFactory;

    protected $table = 'chamados_atribuidos';
    protected $fillable = ['user_id', 'chamado_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
