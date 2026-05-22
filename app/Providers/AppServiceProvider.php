<?php

namespace App\Providers;

use App\Repository\AddToCartServiceRepository;
use App\Repository\Interfaces\AddToCartServiceInterface;
use App\Repository\Interfaces\ProductServiceInterface;
use App\Repository\ProductServiceRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductServiceInterface::class,ProductServiceRepository::class);
        $this->app->bind(AddToCartServiceInterface::class,AddToCartServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
