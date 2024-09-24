<?php

namespace App\Http\Controllers\Front;

use App\Events\OrderCreated;
use App\Events\OrderCreted;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function create(CartRepository $cart)
    {
        return view('front.checkout',[
           'cart'=>$cart,
        ]);
    }


    public function store(Request $request, CartRepository $cart)
    {
        $request->validate([
            'addr.billing.first_name'=>['required','string','max:255'],
            'addr.billing.last_name'=>['required','string','max:255'],
            'addr.billing.email'=>['required','string','max:255'],
            'addr.billing.phone_number'=>['required','string','max:255'],
            'addr.billing.city'=>['required','string','max:255'],

        ]);

        $items = $cart->get()->groupBy('product.store_id')->all();

        DB::beginTransaction();
        try {
            foreach ($items as $store_id=> $cart_items) {
                $order = Order::create([
                    'store_id' => $store_id,
                    'user_id' => Auth::id(),
                    'payment_method' => 'cod',
                ]);

                foreach ($cart_items as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'product_name' => $item->product_name,
                        'price' => $item->product_price,
                        'quantity' => $item->quantity,
                    ]);
                }
                foreach ($request->post('addr') as $type => $address) {
                    $address['type'] = $type;
                    $order->addresses()->creat($address);
                }
            }

        DB::commit();
        event(new OrderCreted($order));

    }    catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('home');

    }


}
