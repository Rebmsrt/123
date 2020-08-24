<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DelMan extends Notification
{
    use Queueable;

    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    //уведомления работают через бд
    public function via($notifiable)
    {
        return ['database'];
    }
//чем заполняется бд
    public function toDatabase($notifiable)
    {

        return [
            'event'=>$notifiable,
            'nat'=>'Вы больше не менеджер'
        ];
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
