<?php

namespace App\Providers;

use App\Repositories\Implementations\UserRepository;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
