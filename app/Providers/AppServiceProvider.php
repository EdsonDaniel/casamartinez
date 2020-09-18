<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Observers\PresentacionObserver; 
use App\PresentacionesProducto;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //linea agregada para versiones menores a 5.5 mysql
        Schema::defaultStringLength(191);
        PresentacionesProducto::observe(PresentacionObserver::class);
    }
}
