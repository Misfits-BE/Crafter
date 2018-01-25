<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserBlockedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /** @var \App\User $auth */
    public $auth;

    /**
     * Create a new notification instance.
     *
     * @param  \App\User $user 
     * @return void
     */
    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $variables = ['contactEmail' => $this->auth->email];

        return (new MailMessage)
            ->subject(trans('users.email.subjects.blocked-user'))
            ->markdown('mails.users.blocked', $variables);
    }
}
