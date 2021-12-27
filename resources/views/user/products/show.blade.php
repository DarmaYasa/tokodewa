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
        <h1 class="sm:w-2/5 font-medium title-font text-2xl mb-2 sm:mb-0">Detail Produk</h1>
    </div>
</section>
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-10 mx-auto">
        <div class="mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full h-64 md:h-144 object-cover object-center rounded-md shadow-md"
                src="{{ $product->thumbnail_url }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest uppercase">
                    {{ $product->category->name }}
                </h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>

                <div class="leading-relaxed py-5">
                    {!! $product->description !!}
                </div>

                <div class="flex mb-4">
                    <span
                        class="title-font font-medium text-2xl text-gray-900">{{ 'Rp' . number_format($product->price) }}</span>
                </div>
                <form action="" method="GET" class="flex" id="cartForm">
                    @csrf
                    <input name="quantity" type="number" min="1"
                        class="pl-3 pr-1 py-2 rounded max-w-16 w-16 mr-2 border-2 border-blue-600" value="1">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    @if(Auth::check() && Auth::user()->hasVerifiedEmail())
                        <button id="buttonSubmit"
                            class="flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded {{ auth()->check() ? '' : 'pointer-events-none opacity-50' }}">Tambah
                            Ke Keranjang</button>
                    @elseif(Auth::check() && !Auth::user()->hasVerifiedEmail())
                        <a href="{{ route('verification.notice') }}"
                            class="flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">Tambah
                            Ke Keranjang</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">Tambah
                            Ke Keranjang</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
<div class="container px-5 py-3 lg:py-5 mx-auto">
    <div class="flex justify-between">
        <h1 class="sm:text-3xl text-2xl font-bold title-font mb-8 text-gray-900">Produk Serupa</h1>
        <a href="#" class="flex justify-items-center hover:text-blue-500">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>
</div>
<div class="container mx-auto flex flex-wrap -m-4 mb-10">
    @foreach($similiarProducts as $key => $product)
        <div class="lg:w-1/4 md:w-1/2 p-2">
            <div
                class="p-4 w-full h-full bg-white shadow-sm rounded-md hover:shadow-lg transition-all duration-500 ease-in-out transform hover:-translate-y-3 mb-5 mr-0 md:mr-5">
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
                    @if(Auth::check() && Auth::user()->hasVerifiedEmail())
                        <form action="" class="cartForm" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button
                                class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg {{ auth()->check() ? '' : 'pointer-events-none opacity-50' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </form>
                    @elseif( Auth::check() && !Auth::user()->hasVerifiedEmail())
                        <a href="{{ route('verification.notice') }}"
                            class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
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
@endsection

@section('script')

<script>
    $('#cartForm').on('submit', function (e) {
        e.preventDefault();
        $('#buttonSubmit').addClass('opacity-50 pointer-envents-none');
        $.ajax({
            type: "POST",
            data: $(this).serializeArray(),
            url: "{{ route('carts.store') }}",
            // processData: false,
            // contentType: false,
            success: function (data) {
                $('#buttonSubmit').removeClass('opacity-50 pointer-envents-none');
                console.log(data);

                // window.open(printURL + '/' + data.invoice.invoice_number, '_blank');
                $('#cartCount').html(Number(data));
                $('#cartCountDesktop').html(Number(data));
                Swal.fire({
                    // heightAuto: false,
                    icon: 'success',
                    title: 'Berhasil',
                    // onAfterClose: () => window.scrollTo(0,0)
                    // showCancelButton: true,
                    // confirmButtonText: 'Cetak Invoice',
                    // cancelButtonText: 'No, cancel!',
                    // reverseButtons: true
                    // text: 'Tidak ada barang yang dimasukkan!',
                })
                // document.getElementById('top').scrollIntoView();
                // $('input[name="customer_code"]').focus();

            },
            error: function (error) {
                console.log(error.responseJSON);
                Swal.fire({
                    backdrop: false,
                    heightAuto: false,
                    icon: 'error',
                    title: 'Gagal',
                    // text: error.responseJSON.error,
                });
                $('#buttonSubmit').removeClass('opacity-50 pointer-envents-none');
            }
        })
    })

</script>
@endsection
