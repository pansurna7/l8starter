<?php

namespace App\Providers;

use App\Models\Submenu;
use Illuminate\Support\Facades\Auth;
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
        $submenus=Submenu::all();

            Gate::define('Pengaturan Wewenang',function($user){
                return $user->hasAnyPermission([
                    'user_show',
                    'user_create',
                    'user_update',
                    'user_detail',
                    'user_delete',
                ]);
            });


        //
    }
}
