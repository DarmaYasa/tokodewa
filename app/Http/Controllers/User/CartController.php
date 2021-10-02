<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        ddd($request->user()->carts);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|numeric|min:1'
        ]);

        $cart = Cart::where('user_id', $request->user()->id)->where('product_id')->first();

        if($cart != null){
            $cart->update(['quantity' => $cart->quantity + $request->quantity]);
        } else {
            $request->user()->carts()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response(null, 204);
    }
}
