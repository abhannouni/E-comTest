<?php

namespace App\Providers;

use App\Services\Implementations\AuthService;
use App\Services\Implementations\OrderService;
use App\Services\Implementations\ProductService;
use App\Services\Specifications\IAuthService;
use App\Services\Specifications\IOrderService;
use App\Services\Specifications\IProductService;
use Illuminate\Support\ServiceProvider;

class ServiceBootstrapProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IOrderService::class, OrderService::class);
        $this->app->bind(IProductService::class, ProductService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
