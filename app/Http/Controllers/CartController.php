<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;

class CartController extends Controller
{
    //
    public function index ()
    {
        $cartItems =  session()->get('cart', []);
        $products = stock::whereIn('id', array_keys($cartItems))->get();

        return view ('cart.index', compact ('products','cartItems'));

    }

    public function add (Request $request, $id)
    {
        $product =  stock::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id]))
        {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name'=>$product->product_name,
                'quantity'=>1,
                'price'=>$product->price,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update (Request $request, $id)
    {
        if($request->quantity <= 0 ){
            return $this->remove($id);
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id]))
        {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

        }

        return redirect()->back()->with('success','Cart  updated');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }


         return redirect()->back()->with('success', 'Product removed from cart successfully!');

    }

    public function clear ()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart clear Successfully.');
    }
}
