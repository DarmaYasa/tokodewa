<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = new Product();
        if($request->filled('search')) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
        }

        if($request->filled('category')) {
            $products = $products->where('product_category_id', $request->category);
        }
        $products = $products->orderBy('name', 'asc')->paginate();
        $categories = ProductCategory::withCount('products')->get();

       return view('user.products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $similiarProducts = Product::where('id', '!=', $product->id)->where('product_category_id', $product->product_category_id)->inRandomOrder()->limit(4)->get();
        return view('user.products.show', compact('product', 'similiarProducts'));
    }
}
