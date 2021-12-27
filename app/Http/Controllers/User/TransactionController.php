<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $carts = $request->user()->carts;

        $transaction = Transaction::create([
            'code' => 'INV'. time(),
            'date' => Carbon::now(),
            'user_id' => $request->user()->id,
        ]);

        foreach ($carts as $cart) {
            $transaction->details()->create([
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'total' => $cart->total
            ]);

            $cart->delete();
            $product = Product::find($cart->product_id);
            $product->update([
                'quantity' => $product->quantity - $cart->quantity
            ]);
        }

        return response($transaction->code, 201);
    }
}
