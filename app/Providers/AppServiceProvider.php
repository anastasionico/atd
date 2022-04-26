<?php

namespace App\Providers;

use App\Http\Repositories\ApiProductRepository;
use App\Http\Repositories\ProductsRepositoryInterface;
use App\Http\Services\ProductService;
use App\Http\Services\ServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ServiceInterface::class, ProductService::class);

        $this->app->bind(ProductsRepositoryInterface::class, ApiProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
