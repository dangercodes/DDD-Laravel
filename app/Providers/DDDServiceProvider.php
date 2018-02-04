<?php

namespace DDD\Providers;

use Illuminate\Support\ServiceProvider;

class DDDServiceProvider extends ServiceProvider 
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DDD\Repository\Contract\ICustomerRepository', 'DDD\Repository\MySQL\CustomerRepository');
    }
}