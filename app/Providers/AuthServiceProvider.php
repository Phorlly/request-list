<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Department;
use App\Policies\DepartmentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Department::class => DepartmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-admin', function ($user) {
            return in_array($user->role, [1]);
        });

        Gate::define('view-dashboard', function ($user) {
            return in_array($user->role, [1, 3, 4, 5, 6]);
        });

        Gate::define('view-approval', function ($user) {
            return in_array($user->role, [3, 4, 5, 6]);
        });

        Gate::define('view-requester', function ($user) {
            return in_array($user->role, [2]);
        });
    }
}
