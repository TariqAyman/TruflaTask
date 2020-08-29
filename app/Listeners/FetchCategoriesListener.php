<?php

namespace App\Listeners;

use App\Repository\CategoryRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;

class FetchCategoriesListener implements ShouldQueue
{
    private $categoryRepository;
    /**
     * Create the event listener.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface  $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle the event.
     *
     * @param $event
     * @return void
     */
    public function handle($event)
    {
        $this->categoryRepository->fetchApi($event->data->genres);
    }
}
