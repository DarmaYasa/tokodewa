@extends('layouts.user-master')

@section('title')
Home
@endsection

@section('content')
<section class="text-gray-600 body-font">
    <div class="px-5 mx-auto mt-5 rounded-md overflow-hidden relative">
        {{-- <div class="absolute bg-gray-900 bg-opacity-25 w-1/3 z-10 right-0" style="height: 700px">

        </div> --}}
        <div id="slider" class="w-full rounded-md overflow-hidden h-56 lg:h-144">
            @foreach ($sliders as $slider)
            <div class="">
                <img class="h-56 lg:h-156" src="{{$slider }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-3 lg:py-5 mx-auto">
        <div class="flex justify-between">
            <h1 class="sm:text-3xl text-2xl font-bold title-font mb-8 text-gray-900">Produk Terlaris</h1>
            <a href="#" class="flex justify-items-center hover:text-blue-500">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        <div class="container mx-auto flex flex-wrap -m-4">
            @foreach ($popularProducts as $key => $product)
            <div
                class="lg:w-1/4 md:w-1/2 p-4 w-full bg-white shadow-sm rounded-md hover:shadow-lg transition-all duration-500 ease-in-out transform hover:-translate-y-3 mb-5 mr-0 md:mr-5">
                <a class="block relative h-48 md:h-60 rounded overflow-hidden">
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
                    <button
                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg {{ auth()->check() ? '' : 'pointer-events-none opacity-50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-3 lg:py-5 mx-auto">
        <div class="flex justify-between">
            <h1 class="sm:text-3xl text-2xl font-bold title-font mb-8 text-gray-900">Produk Terbaru</h1>
            <a href="#" class="flex justify-items-center hover:text-blue-500">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        <div class="container mx-auto flex flex-wrap -m-4">
            @foreach ($products as $key => $product)
            <div
                class="lg:w-1/4 md:w-1/2 p-4 w-full bg-white shadow-sm rounded-md hover:shadow-lg transition-all duration-500 ease-in-out transform hover:-translate-y-3 mb-5 mr-0 md:mr-5">
                <a class="block relative h-48 md:h-60 rounded overflow-hidden">
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
                    <button
                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg {{ auth()->check() ? '' : 'pointer-events-none opacity-50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        // $('table').DataTable();
        $('#slider').slick({
            dots: true,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });

</script>
@endsection
