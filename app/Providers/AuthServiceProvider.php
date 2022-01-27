<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::define('role', function (User $user, $tipoRole) {
            return $user->role->description == $tipoRole;
        });*/

        Gate::define('roles', function (User $user, ...$tipoRole) {
            $respuesta = false;

            foreach ($tipoRole as $role) {
                if ($user->role->description == $role) {
                    $respuesta = true;
                }
            }

            return $respuesta;
        });
    }
}
