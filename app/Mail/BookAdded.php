<?php

namespace App\Mail;

use App\Models\Book;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookAdded extends Mailable
{

    use Queueable, SerializesModels;

    private $user;

    private $book;

    /**
     * Create a new message instance.
     *
     * @param \App\User        $user
     * @param \App\Models\Book $book
     */
    public function __construct(User $user, Book $book)
    {
        $this->user = $user;
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.books.added')
                    ->with([
                        'user' => $this->user,
                        'book' => $this->book,
                    ]);;
    }
}
