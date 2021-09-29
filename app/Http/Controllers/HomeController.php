<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = [];
        $products = Product::latest()->limit(10)->get();
        return view('user.index', compact('products', 'sliders'));
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
}
