<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Perfil;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function(User $user){
            if($user->perfil_id == Perfil::ADMINISTRADOR)
                return true;
        });

        Gate::define('perfil-tecnico', function(User $user){
            return $user->perfil_id == Perfil::TECNICO;
        });

        Gate::define('perfil-usuario', function(User $user){
            return $user->perfil_id == Perfil::USUARIO;
        });
    }
}
