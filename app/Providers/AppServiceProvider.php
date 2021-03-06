<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    public function boot(UrlGenerator $url)
    {
        if(app()->environment('production')){
            $url->forceScheme('https');
        }

        Schema::defaultStringLength(191);
    }
}
