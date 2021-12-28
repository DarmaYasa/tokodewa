<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $redirect = 'admin.products.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return response($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'product_category_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image',
        ]);
        try {
            $thumbnail = $request->thumbnail->store('/products');

            $product = Product::create([
                'name' => $request->name,
                'product_category_id' => $request->product_category_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description,
                'thumbnail' => $thumbnail,
            ]);
            $product->load('category');
            return response($product, 201);
        } catch (\Throwable$th) {
            throw new Exception($th->getMessage(), 1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('category');
        return response($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'product_category_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image',
        ]);

        if ($request->hasFile('thumbnail')) {
            Storage::delete($product->thumbnail);
            $thumbnail = $request->thumbnail->store('/products');
        }

        $product->update([
            'name' => $request->name,
            'product_category_id' => $request->product_category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'thumbnail' => isset($thumbnail) ? $thumbnail : $product->thumbnail,
        ]);

        $product->load('category');

        return response($product, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response(null, 204);
    }
}
