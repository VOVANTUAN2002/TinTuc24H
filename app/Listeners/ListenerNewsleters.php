<?php

namespace App\Listeners;

use App\Events\EventNewsleters;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerNewsleters
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventNewsleters  $event
     * @return void
     */
    public function handle(EventNewsleters $event)
    {
        $new = $event->Newsleter;
    }
}
