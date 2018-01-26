<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * @author
 * @copyright
 * @package
 */
class UserActiveNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Current user data. 
     * 
     * @var \App\User $user
     */
    public $user; 

    /**
     * Create a new notification instance.
     *
     * @param  \App\User $user  Current user data
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        return (new MailMessage)
            ->subject(trans('ban.email.titles.unban'))
            ->markdown('mails.users.active');
    }
}
