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
            if($user->isAdministrador())
                return true;
        });

        Gate::define('perfil-tecnico', function(User $user){
            return $user->isTecnico();
        });

        Gate::define('perfil-usuario', function(User $user){
            return $user->isUsuario();
        });

        Gate::define('acesso-pessoal', function(User $user, User $userAlvo){
            if($user->id == $userAlvo->id)
                return true;
            else if(($userAlvo->isAdministrador()) && (!$user->isAdministrador()))
                return false;
            else if($user->isTecnico())
                return true;
        });
    }
}
