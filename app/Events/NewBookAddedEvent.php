<?php

namespace App\Events;

use App\Models\Book;
use App\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewBookAddedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\User
     */
    public $user;

    /**
     * @var \App\Models\Book
     */
    public $book;

    /**
     * Create a new event instance.
     *
     * @param \App\User        $user
     * @param \App\Models\Book $book
     */
    public function __construct(User $user, Book $book)
    {
        $this->user = $user;
        $this->book = $book;
    }
}
