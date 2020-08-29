<?php

namespace App\Listeners;

use App\Repository\MovieRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;

class FetchLatestMovieListener implements ShouldQueue
{
    /**
     * @var MovieRepositoryInterface
     */
    private $movieRepository;

    /**
     * Create the event listener.
     *
     * @param MovieRepositoryInterface $movieRepository
     */
    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * Handle the event.
     *
     * @param $event
     * @return void
     */
    public function handle($event)
    {
        $this->movieRepository->fetchApi($event->data);
    }
}
