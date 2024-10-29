<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserManagementPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserManagementPolicy::class
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-any-employees', [UserManagementPolicy::class, 'viewAnyEmployees']);
        Gate::define('view-any-clients', [UserManagementPolicy::class, 'viewAnyClients']);
        Gate::define('manage-employees', [UserManagementPolicy::class, 'manageEmployees']);
        Gate::define('manage-clients', [UserManagementPolicy::class, 'manageClients']);
        Gate::define('manage-own-account', [UserManagementPolicy::class, 'manageOwnAccount']);
    }
}
