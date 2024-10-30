<?php

namespace App\Providers;

use App\Services\Implementations\AuthService;
use App\Services\Implementations\OrderService;
use App\Services\Specifications\IAuthService;
use App\Services\Specifications\IOrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IOrderService::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
