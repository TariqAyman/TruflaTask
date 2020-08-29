<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\CategoryRepository;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\MovieRepository;
use App\Repository\MovieRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
    }
}
