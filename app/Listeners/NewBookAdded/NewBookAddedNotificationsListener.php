<?php

namespace App\Listeners\NewBookAdded;

use App\Events\NewBookAddedEvent;
use App\Notifications\BookAdded;

class NewBookAddedNotificationsListener
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
     * @param NewBookAddedEvent $event
     *
     * @return void
     */
    public function handle(NewBookAddedEvent $event)
    {
        if($event->user->isAdmin()) {
            $event->user->notify(new BookAdded($event->user, $event->book));
        }
    }
}
