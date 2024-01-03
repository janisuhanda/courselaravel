<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('isAdministrator',function($user){
            // return $use->role->name; // kalo membuat relasi 1 role banyak user
            return $user->roles()->where('name','Administrator')->exists();
        });
        Gate::define('isAdmin',function($user){
            return $user->roles()->where('name','Admin')->exists();
        });
        Gate::define('isUserBiasa',function($user){
            return $user->roles()->where('name','User Biasa')->exists();
        });
    }
}
