<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AuthenticationInterface;
use App\Http\Repositories\AuthenticationRepository;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AuthenticationInterface::class, AuthenticationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
