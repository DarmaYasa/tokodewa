<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
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
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create', compact('categories'));
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

            //code...
            $thumbnail = $request->thumbnail->store('/products');

            Product::create([
                'name' => $request->name,
                'product_category_id' => $request->product_category_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description,
                'thumbnail' => $thumbnail,
            ]);

            return redirect(route($this->redirect))->with('success', 'Sukses menambah data');
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
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('admin.products.edit', compact('product', 'categories'));
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

        return redirect(route($this->redirect))->with('success', 'Sukses mengupdate data');
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

        return redirect(route($this->redirect))->with('success', 'Sukses menghapus data');
    }
}
