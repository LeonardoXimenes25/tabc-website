<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \Illuminate\Cookie\Middleware\EncryptCookies::class, // Ubah namespace
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Ubah namespace
            \Illuminate\Session\Middleware\StartSession::class, // Ubah namespace
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Ubah namespace
            \App\Http\Middleware\VerifyCsrfToken::class, // Ini kemungkinan benar (middleware custom kamu)
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Ubah namespace
        ]);

        $middleware->alias([
            'filament.role' => \App\Http\Middleware\CheckFilamentRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
