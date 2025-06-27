<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
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
        Filament::serving(function () {
            Gate::define('viewFilament', function ($user) {
                // Batasi akses hanya untuk user dengan role 'admin' atau 'majelis'
                return in_array($user->role, ['admin', 'majelis']);
            });
        });
    }
}
