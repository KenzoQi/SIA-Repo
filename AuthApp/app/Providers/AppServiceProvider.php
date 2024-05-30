<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Code here if you need to register any services
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share global variables for views
        View::share('title', 'Laravel: AuthApp');
        View::share('dashtitle', 'Dashboard');
        View::share('logtitle', 'Log in');
        View::share('regtitle', 'Register');

        // Define global variables for controllers
        $registeredUserController = RegisteredUserController::class;
        $authenticatedSessionController = AuthenticatedSessionController::class;

        // Share controller variables for views
        View::share('registeredUserController', $registeredUserController);
        View::share('authenticatedSessionController', $authenticatedSessionController);
    }
}
