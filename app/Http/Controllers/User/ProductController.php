<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('name', 'asc')->paginate();

       return $products;
    }

    public function show(Product $product)
    {
        return $product;
    }
}
