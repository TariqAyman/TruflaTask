<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FetchTopMoviesEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $num_of_pages;

    /**
     * Create a new event instance.
     *
     * @param $num_of_pages
     */
    public function __construct($num_of_pages)
    {
        //
        $this->num_of_pages = $num_of_pages;
    }
}
