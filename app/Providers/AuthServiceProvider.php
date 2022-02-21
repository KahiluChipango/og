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

        Gate::define('logged-in', function ($user){
            return $user;
        });


        /*Super Admin Gates*/
        Gate::define('is-super-admin', function ($user){
            return $user->hasAnyRole('Super Admin');
        });


        /*Admin Gates*/
        Gate::define('admin', function ($user){
            return $user->hasAnyRole('Admin');
        });

        /*Front Desk Gates*/
        Gate::define('is-front-desk', function ($user){
            return $user->hasAnyRole('Front Desk');
        });

        /* Accounts Gate*/
        Gate::define('is-accounts', function ($user){
            return $user->hasAnyRole('Accounts');
        });

        /* Agents Gate*/
        Gate::define('is-agents', function ($user){
            return $user->hasAnyRole('Agents');
        });


    }
}
