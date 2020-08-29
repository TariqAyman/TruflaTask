<?php

namespace App\Providers;

use App\Events\FetchCategoriesEvent;
use App\Events\FetchLatestMovieEvent;
use App\Events\FetchTopMoviesEvent;
use App\Listeners\FetchCategoriesListener;
use App\Listeners\FetchLatestMovieListener;
use App\Listeners\FetchTopMoviesListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        FetchCategoriesEvent::class => [
            FetchCategoriesListener::class,
        ],
        FetchLatestMovieEvent::class => [
            FetchLatestMovieListener::class,
        ],
        FetchTopMoviesEvent::class => [
            FetchTopMoviesListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
