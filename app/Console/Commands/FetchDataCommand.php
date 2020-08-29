<?php

namespace App\Console\Commands;

use App\Clients\ThemoviedbClient;
use App\Clients\ThemoviedbClientInterface;
use App\Events\FetchCategoriesEvent;
use App\Events\FetchLatestMovieEvent;
use App\Events\FetchTopMoviesEvent;
use Illuminate\Console\Command;

class FetchDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetchThemoviedbData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =  'This is a job that should be executed every configurable interval timer in .env period to feed our db with themoviedb api';

    protected $client;

    /**
     * Create a new command instance.
     *
     * @param ThemoviedbClientInterface $client
     */
    public function __construct(ThemoviedbClientInterface $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        event(new FetchCategoriesEvent($this->client->getCategories()));
        event(new FetchLatestMovieEvent($this->client->getLatestMovie()));
        event(new FetchTopMoviesEvent(env('num_of_pages',5)));
    }
}
