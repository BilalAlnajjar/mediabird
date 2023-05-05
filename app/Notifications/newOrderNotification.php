<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class newOrderNotification extends Notification
{
    use Queueable;

    /**
     * @var Order
     */
    protected $order;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, User $user)
    {
        //
        $this->order = $order;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];//,'database','nexmo','bordcast' // database,sms,flash notification
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('طلب جديد')
                    ->from('sales@mediabirdco.com','Bilal alnajjar')
                    ->greeting('Hello'.$notifiable->name)
                    ->line('A new order has been created order',$this->order->id)
                    ->action('View new order', route('work.dashbord'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'لقد ارسل اليك : '.$this->user->name .' طلب جديد',
            'action' => route('work.dashbord'),
            'icon' => '',
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
