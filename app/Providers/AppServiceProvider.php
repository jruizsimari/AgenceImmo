<?php

namespace App\Providers;

use App\Weather;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->app->singleton('weather', fn () => new Weather('dl4dsfl45slfjfd'));
        $this->app->singleton(Weather::class, fn () => new Weather('dl4dsfl45slfjfd'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
