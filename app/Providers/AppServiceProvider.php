<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('access-manager-panel', function (User $user) {

            if (method_exists($user, 'hasAnyRole')) {
                return $user->hasAnyRole(['admin', 'manager']);
            }

            return false;
        });
    }
}
