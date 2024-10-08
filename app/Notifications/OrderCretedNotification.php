<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCretedNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database','broadcast'];

        $channels = ['database'];

        if ($notifiable->notification_preferences['order_created']['sms']?? false ){
            $channels[]='vonage';
        }

        if ($notifiable->notification_preferences['order_created']['mail']?? false ){
            $channels[]='mail';
        }

        if ($notifiable->notification_preferences['order_created']['broadcast']?? false ){
            $channels[]='broadcast';
        }
        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage

    {
        $addr = $this->order->billingAddress();
        return (new MailMessage)
                    ->subject("new order #{$this->order->number}")
                    ->greeting("hi {$notifiable->name},")
                    ->line("a new order (#{$this->order->number}) created by {$addr->name}")
                    ->action('view order', url('/dashboard'))
                    ->line('Thank you for using our application!') ;
    }

    public function toDatabase(object $notifiable)
    {
        $addr = $this->order->billingAddress();

        return[
            'body'=>"a new order (#{$this->order->number}) created by {$addr->name}",
            'icon'=>'fac fa-file',
            'url'=>url('/dashboard'),
            'order_id'=>$this->order->order_id,
        ];
    }

    public function toBroadcast(object $notifiable)
    {
        $addr = $this->order->billingAddress();

        return[
            'body'=>"a new order (#{$this->order->number}) created by {$addr->name}",
            'icon'=>'fac fa-file',
            'url'=>url('/dashboard'),
            'order_id'=>$this->order->order_id,
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
