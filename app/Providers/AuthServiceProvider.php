<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Festa' => 'App\Policies\FestaPolicy',
        'App\Models\Funcao' => 'App\Policies\FuncaoPolicy',
        'App\Models\Permissao' => 'App\Policies\PermissaoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            return $user->isAdmin();
        });

        Gate::define('funcoes-ver', function($user) {
            return $user->isAdmin();
        });

        Gate::define('permissoes-ver', function($user) {
            return $user->isAdmin();
        });
    }
}
