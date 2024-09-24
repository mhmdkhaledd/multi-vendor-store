<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{

    public function index(CartRepository $cart)
    {

        return view('front.cart',[
            'cart'=>$cart,
        ]);
    }



    public function store(Request $request, CartRepository $cart)
    {
        $request->validate([
           'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['nullable','int','min:1'],
        ]);

        $product= product::findOrFail($request->post('product_id'));
        $cart->add($product,$request->post('quantity'));

        return redirect()->route('cart.index')->with('success','product added to cart');
    }


    public function update(Request $request, CartRepository $cart)
    {
        $request->validate([
            'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['nullable','int','min:1'],
        ]);

        $product= product::findOrFail($request->post('product_id'));
        $cart->update($product,$request->post('quantity'));
    }


    public function destroy(CartRepository $cart,string $id)
    {
        $repository = App::make('cart');
        $cart->delete($id);
    }
}
