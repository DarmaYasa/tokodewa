@extends('layouts.user-master')

@section('title')
Product
@endsection

@section('content')
<section class="container rounded-xl mx-auto my-5 items-center text-gray-900 bg-gray-100 overflow-hidden">
    <img class="w-full h-48 object-cover object-center"
        src="https://images.unsplash.com/photo-1580719993950-0d35ce87c26f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2070&q=80"
        alt="">
    <div class="flex items-center px-3 py-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
        </svg>
        <h1 class="sm:w-2/5 font-medium title-font text-2xl mb-2 sm:mb-0">Produk</h1>
    </div>
</section>
<section class="body-font">
    <div class="container px-3 py-5 mx-auto flex flex-col md:flex-row">
        <div class="w-full md:w-1/4 mb-5 pr-0 md:pr-5">
            <div class="bg-white rounded-md p-3">
                <h1 class="w-full font-medium title-font text-xl py-3 text-center bg-gray-100 rounded">Kategori</h1>
                @foreach($categories as $key => $category)
                    <a href="{{ url('') }}/products?category={{ $category->id }}"
                        class="rounded flex p-3 h-full items-center justify-between border-b">
                        <span class="title-font font-medium">{{ $category->name }}</span>
                        <span
                            class="w-10 h-10 rounded-full bg-blue-400 flex items-center justify-center text-white">{{ $category->products_count }}</span>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="w-full md:w-3/4 mb-5">
            <div class="flex flex-wrap">
                @foreach($products as $key => $product)
                    <div class="lg:w-1/4 md:w-1/2 p-2">
                        <div
                            class="p-3 w-full h-full bg-white shadow-sm rounded-md hover:shadow-lg transition-all duration-500 ease-in-out transform hover:-translate-y-3 mb-5 mr-0 md:mr-5">
                            <a class="block relative h-32 md:h-48 rounded overflow-hidden">
                                <img alt="ecommerce" class=" h-full block w-full object-center object-cover"
                                    src="{{ $product->thumbnail_url }}">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 uppercase">
                                    {{ $product->category->name }}</h3>
                                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                                <p class="mt-1">{{ 'Rp'. number_format($product->price) }}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">Lihat
                                    Detail</a>
                                @if(Auth::check() && Auth::user()->hasVerifiedEmail())
                                    <form action="" class="cartForm" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button
                                            class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg {{ auth()->check() ? '' : 'pointer-events-none opacity-50' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <blade
                                        elseif|%20(Auth%3A%3Acheck()%20%26%26%20!Auth%3A%3Auser()-%3EhasVerifiedEmail()) />
                                    <a href="{{ route('verification.notice') }}"
                                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
