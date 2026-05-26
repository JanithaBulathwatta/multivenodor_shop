<?php

namespace App\Providers;

use App\Repository\AddToCartServiceRepository;
use App\Repository\BuyItemServiceRepository;
use App\Repository\CustomerServiceRepository;
use App\Repository\Interfaces\AddToCartServiceInterface;
use App\Repository\Interfaces\BuyItemServiceInterface;
use App\Repository\Interfaces\CustomerServiceInterface;
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
        $this->app->bind(CustomerServiceInterface::class,CustomerServiceRepository::class);
        $this->app->bind(BuyItemServiceInterface::class,BuyItemServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
