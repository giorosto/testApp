<?php

namespace App\Providers;

use App\Interfaces\AdminUserServicesInterface;
use App\Interfaces\BlogServicesInterface;
use App\Services\AdminUserServices;
use App\Services\BlogServices;
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
        $this->app->bind(BlogServicesInterface::class,function(){
            return new BlogServices();
        });
        $this->app->bind(AdminUserServicesInterface::class, function(){
            return new AdminUserServices();
        });
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
