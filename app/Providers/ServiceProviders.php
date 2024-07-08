<?php

namespace App\Providers;

use App\Services\ClassServices\EventService;
use App\Services\ClassServices\postService;
use App\Services\InterfacesServices\EventServiceInterface;
use App\Services\InterfacesServices\postServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(postServiceInterface::class,postService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
