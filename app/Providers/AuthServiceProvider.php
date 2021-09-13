<?php

namespace App\Providers;

use App\Models\User\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPermissions();
    }

    private function registerPermissions(): void
    {
        Gate::define('admin.panel', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage.users', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });
    }
}
