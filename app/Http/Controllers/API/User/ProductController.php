<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = new Product();
        $products->load(['category']);

        if ($request->filled('search')) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $products = $products->where('product_category_id', $request->category);
        }
        $products = $products->orderBy('name', 'asc')->paginate();

        return response($products);
    }

    public function show(Product $product)
    {
        $product->load('category');
        $similiarProducts = Product::where('id', '!=', $product->id)
            ->where('product_category_id', $product->product_category_id)
            ->inRandomOrder()->limit(4)->get();

        return response([
            'product' => $product,
            'similiar_products' => $similiarProducts,
        ]);
    }
}
