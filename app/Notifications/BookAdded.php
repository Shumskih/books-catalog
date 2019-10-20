<?php

namespace App\Notifications;

use App\Channels\TelegramChannel;
use App\Custom\Facades\MessagesService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class BookAdded extends Notification
{

    use Queueable;

    private $user;

    private $book;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $book
     */
    public function __construct($user, $book)
    {
        $this->user = $user;
        $this->book = $book;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'slack',
            'mail',
            TelegramChannel::class
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('New Book Added')
                                ->view('emails.books.added', [
                                    'user' => $this->user,
                                    'book' => $this->book,
                                ]);

    }

    public function toSlack($notifiable): SlackMessage
    {
        return (new SlackMessage)
            ->success()
            ->content($this->message());
    }

    public function toTelegram($notifiable)
    {
        return MessagesService::toTelegram($this->message());
    }

    private function message(): string
    {
        return "New Book Added: {$this->book->title}.\n
                View: <http://127.0.0.1:8000/admin/book/{$this->book->id}|Click here>";
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
