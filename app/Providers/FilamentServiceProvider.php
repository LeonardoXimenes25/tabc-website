<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
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
     public function boot()
    {
       Filament::serving(function () {
            // Batasi akses berdasarkan role
            Gate::define('viewFilament', function ($user) {
                return auth('admin')->check() && in_array(auth('admin')->user()->role, ['admin', 'majelis']);
            });
        });
    }
}
