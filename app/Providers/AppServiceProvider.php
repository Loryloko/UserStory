<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //
         \Laravel\Fortify\Fortify::loginView(function () {
        return view('auth.login');
    });

    // Mostra la vista di registrazione
    \Laravel\Fortify\Fortify::registerView(function () {
        return view('auth.register');
    });
    }
}
