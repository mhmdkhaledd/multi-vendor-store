<?php

namespace App\Repositories\Cart;
use App\Models\product;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

    class CartModelRepository implements CartRepository
{

    public function get()
    {
        return cart::with('product')
             ->get();
    }

    public function add(product $product,$quantity )
    {
        return cart::create([
            'user_id'=> Auth::id(),
            'product_id'=> $product->id,
            'quantity'=> $quantity,
        ]);
    }

    public function update($id,$quantity)
    {
       cart::where('id','=',$id)
       ->update([
           'quantity' => $quantity
       ]);
    }

    public function delete($id)
    {
        cart::where('id','=',$id)
            ->delete();
    }

    public function empty()
    {
        cart::query()->delete();
    }

    public function total() : float
    {
        return (float)  cart::join('products','products.id','=','carts.product_id')
            ->selectRaw('sum(products.price * carts.quantity) as total')
            ->value('total');
    }

}

