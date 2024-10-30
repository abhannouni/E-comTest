<?php

namespace App\Providers;

use App\Repositories\Implementations\OrderRepository;
use App\Repositories\Implementations\UserRepository;
use App\Repositories\Specifications\IOrderRepository;
use App\Repositories\Specifications\IUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryBootstrapProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
