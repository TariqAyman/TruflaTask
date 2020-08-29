<?php

namespace App\Providers;

use App\Clients\ThemoviedbClient;
use App\Clients\ThemoviedbClientInterface;
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
        //
        $this->app->bind(ThemoviedbClientInterface::class, ThemoviedbClient::class);
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
