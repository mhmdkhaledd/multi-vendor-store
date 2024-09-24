<?php

namespace App\Listeners;

use App\Events\OrderCreted;
use App\Models\cart;
use App\Models\product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use PHPUnit\Event\Code\Throwable;

class DeductProductQuantity
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
        //update product quantity
        try {
            foreach ($order->products as $product) {

                $product->decrement('quantity', $product->order_item->quantity);
                // product::where('id','=',$item->product_id)
                //   ->update([
                //     'quantity'=>DB::raw('quantity -'.$item->quantity)
                //]);
            }
        }        catch(\Throwable $e){}

    }
}
