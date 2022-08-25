<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Add_service_new extends Notification
{
    use Queueable;

    private $SERVICE_ID;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($SERVICE_ID)
    {
        $this->SERVICE_ID = $SERVICE_ID;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [

            'id' => $this->SERVICE_ID,
            'title' => 'New service added by : ',
            'user'=>auth()->user()->name,
        ];

    }
}
