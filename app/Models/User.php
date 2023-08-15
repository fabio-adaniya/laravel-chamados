<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Chamado;
use App\Models\Perfil;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'perfil_id', 'ativo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    public function chamados($status = null, $urgencia = null)
    {
        $query = $this->belongsToMany(Chamado::class, 'chamados_solicitantes', 'user_id', 'chamado_id');

        if($status)
            $query = $query->where('status', $status);
        if($urgencia)
            $query = $query->where('urgencia', $urgencia);

        return $query;
    }

    public function isAdministrador()
    {
        return $this->perfil_id == Perfil::ADMINISTRADOR;
    }

    public function isTecnico()
    {
        return $this->perfil_id == Perfil::TECNICO;
    }

    public function isUsuario()
    {
        return $this->perfil_id == Perfil::USUARIO;
    }
}
