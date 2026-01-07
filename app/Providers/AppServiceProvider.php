<?php

namespace App\Providers;

use App\Providers\Auth\CustomAuthProvider;
use Illuminate\Support\Facades\Auth;
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
        Auth::provider('custom-auth', function ($app, array $config) {
            return new CustomAuthProvider();
        });
    }
}
