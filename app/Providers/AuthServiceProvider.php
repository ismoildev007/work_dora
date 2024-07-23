<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Helpers\MainHelper;
use Faker\Extension\Helper;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 0===Admin , 1===Manager , 2===User
        Gate::define('view-notification', function ($user) {
            return in_array($user->role, [0, 1, 2]); // Notification ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-amount', function ($user) {
            return in_array($user->role, [0]); // Amount ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-employee', function ($user) {
            return in_array($user->role, [0, 1]); // Work ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-department', function ($user) {
            return in_array($user->role, [0]); // Work ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-project', function ($user) {
            return in_array($user->role, [0, 1]); // Work ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-manager', function ($user) {
            return in_array($user->role, [0]); // Work ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-status', function ($user) {
            return in_array($user->role, [0, 1, 2]); // Work ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-client', function ($user) {
            return in_array($user->role, [0]); // Work ni ko'rish mumkin bo'lgan rollar
        });
        Gate::define('view-work', function ($user) {
            return in_array($user->role, [0, 1, 2]); // Work ni ko'rish mumkin bo'lgan rollar
        });

    }
}
