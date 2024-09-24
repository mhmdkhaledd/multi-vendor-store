<?php

namespace App\Listeners;

use App\Events\OrderCreted;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderCretedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderCreatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreted $event): void
    {
        $order = $event->order;

        $user = User::where('store_id',$order->store_id)->first();
        $user->notify(new OrderCretedNotification($order));

        /*$users = User::where('store_id', $order->store_id)->get();
        \Illuminate\Support\Facades\Notification::send($users,new OrderCretedNotification($order));*/
    }
}
