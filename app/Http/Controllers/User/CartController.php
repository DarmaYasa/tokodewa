<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = $request->user()->carts;
        // dd($request->user()->carts);
        return view('user.carts.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|numeric|min:1'
        ]);

        $product = Product::find($request->product_id);
            $cart = Cart::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
    
            if($cart != null){
                if($product->quantity >= ($cart->quantity + $request->quantity)){
                    $cart->update(['quantity' => $cart->quantity + $request->quantity]);
                }
                else {
                    return response("Kuantiti melebihi", 400);
                }
            } else {
                if($product->quantity >= $request->quantity) {
                    $request->user()->carts()->create([
                        'product_id' => $request->product_id,
                        'quantity' => $request->quantity,
                    ]);
                }
                else {
                    return response("Kuantiti melebihi", 400);
                }
            }
            
        

        return response($request->user()->carts->count(), 201);
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return response([
            'total' => $cart->total,
            'grand_total' => $request->user()->total_cart
        ], 201);
    }

    public function destroy(Request $request, Cart $cart)
    {
        $cart->delete();

        $data = [
            'count' => $request->user()->carts->count(),
            'total' => $request->user()->total_cart,
        ];
        return response($data, 201);
    }
}
