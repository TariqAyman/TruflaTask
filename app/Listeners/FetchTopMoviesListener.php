<?php

namespace App\Listeners;

use App\Clients\ThemoviedbClientInterface;
use App\Repository\MovieRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;

class FetchTopMoviesListener implements ShouldQueue
{
    /**
     * @var MovieRepositoryInterface
     */
    protected $movieRepository;
    /**
     * @var ThemoviedbClientInterface
     */
    private $client;

    /**
     * Create the event listener.
     *
     * @param MovieRepositoryInterface $movieRepository
     * @param ThemoviedbClientInterface $client
     */
    public function __construct(MovieRepositoryInterface $movieRepository,ThemoviedbClientInterface $client)
    {
        $this->movieRepository = $movieRepository;
        $this->client = $client;
    }

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        $results = null;
        $count_pages = 1;
        while ($count_pages <= $event->num_of_pages){
            $results = collect($results)->merge($this->client->getTopMovies($count_pages)->results);
            $count_pages++;
        }

        if (null !== $results){
            foreach ($results as $data){
                $movie = $this->client->getMovie($data->id);
                $this->movieRepository->fetchApi($movie);
            }
        }
    }
}
