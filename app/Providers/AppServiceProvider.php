<?php

namespace App\Providers;

use App\Repositories\Classes\AccessoryRepository;
use App\Repositories\Interfaces\AccessoryRepositoryInterface;
use App\Services\ClassServices\AccessoryService;
use App\Services\ClassServices\EventService;
use App\Services\InterfacesServices\AccessoryServiceInterface;
use App\Services\InterfacesServices\EventServiceInterface;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\AcceptHeader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding the interface to the implementation
        $this->app->bind(EventServiceInterface::class, EventService::class);
        // $this->app->bind(AccessoryRepositoryInterface::class, AccessoryRepository::class);
        // $this->app->bind(AccessoryServiceInterface::class, AccessoryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
