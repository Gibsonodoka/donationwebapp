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
    ->withMiddleware(function (Middleware $middleware): void {
        /*
        |--------------------------------------------------------------------------
        | Global Middleware
        |--------------------------------------------------------------------------
        | If you ever need middleware to run on every request, register it here.
        | For example, you could add:
        | $middleware->append(\App\Http\Middleware\TrustProxies::class);
        */

        /*
        |--------------------------------------------------------------------------
        | Route Middleware Aliases
        |--------------------------------------------------------------------------
        | Middleware aliases let you apply short names to middleware so you can
        | easily assign them in routes like: ->middleware(['auth', 'admin'])
        */
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'auth' => \App\Http\Middleware\Authenticate::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        /*
        |--------------------------------------------------------------------------
        | Exception Handling
        |--------------------------------------------------------------------------
        | You can register custom exception handling logic here. Laravel will
        | automatically call this when exceptions occur in your application.
        */
    })
    ->create();
