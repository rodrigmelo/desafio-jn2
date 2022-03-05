<?php

namespace App\Providers;

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
        // Repository
        $this->app->bind('App\Repositories\Contracts\ICustomerRepository', 'App\Repositories\CustomerRepository');

        // Services
        $this->app->bind('App\Services\Contracts\ICustomerService', 'App\Services\CustomerService');
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
