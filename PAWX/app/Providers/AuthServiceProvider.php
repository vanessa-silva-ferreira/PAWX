<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Pet;
use App\Policies\UserManagementPolicy;
use App\Policies\PetPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserManagementPolicy::class,
        Pet::class => PetPolicy::class
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
