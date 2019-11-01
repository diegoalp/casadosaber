<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        //Checa se for Super admin
        //Retorna verdadeiro se o auth user type for super admin
        Gate::define('isSuperAdmin', function($user){
            return $user->user_type == 'superadmin';
        });
        
        //Checa se for admin
        //Retorna verdadeiro se o auth user type for admin
        Gate::define('isAdmin', function($user){
            return $user->user_type == 'admin';
        });

        //Checa se for financeiro
        //Retorna verdadeiro se o auth user type for financeiro
        Gate::define('isFinanceiro', function($user){
            return $user->user_type == 'financeiro';
        });

        //Checa se for professor
        //Retorna verdadeiro se o auth user type for professor
        Gate::define('isProfessor', function($user){
            return $user->user_type == 'professor';
        });

        //Checa se for pai
        //Retorna verdadeiro se o auth user type for pai
        Gate::define('isPai', function($user){
            return $user->user_type == 'pai';
        });
    }
}
