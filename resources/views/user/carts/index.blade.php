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
        <h1 class="sm:w-2/5 font-medium title-font text-2xl mb-2 sm:mb-0">Carts</h1>
    </div>
</section>
<section class="body-font">
    <div class="container px-3 py-5 mx-auto flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 pr-0 md:pr-5">
            <div class="space-y-6">
                @foreach ($carts as $cart)
                <div class="flex p-3 shadow-sm w-full bg-white rounded" id="cart_{{ $cart->id}}">
                    <div class="w-32 h-24 bg-gray-400">
                        <img src="{{ $cart->product->thumbnail_url}}"
                            class="object-center object-cover rounded w-full h-full" />
                    </div>
                    <div class="flex-grow pl-3">
                        <div class="flex justify-between items-center">
                            <span class="text-xs uppercase text-gray-700">{{ $cart->product->category->name }}</span>
                            <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" class="deleteCartForm"
                                data-id="{{ $cart->id }}">
                                @csrf
                                @method('delete')
                                <button class="text-red-500 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <h1 class="font-medium text-lg md:text-xl mb-2">{{ $cart->product->name }}</h1>
                        <input type="hidden" name="product_price" value="{{ $cart->product->price }}">
                        <input type="hidden" name="total" value="{{ $cart->total }}">
                        <input type="number" min="1" max="{{ $cart->product->quantity }}" value="{{ floatval($cart->quantity) }}" onchange="changeQuantity({{ $cart->id }}, event)"
                            class="border-none bg-gray-100 pl-2 pr-1 py-2 focus:outline-none focus:border-blue-600 rounded w-14">
                        <span class="price ml-2">Rp{{ number_format($cart->product->price) }}</span>
                        <span

                            class="total ml-0 border-l-0 md:ml-2 md:border-l px-0 md:px-3 block md:inline py-3 md:py-0 font-medium">Rp{{ number_format($cart->total) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex-grow"></div>
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded p-5 shadow-sm">
                <h1 class="font-medium text-lg">Total</h1>
                <h1 class="font-bold text-2xl" id="totalCart">Rp {{ number_format(Auth::user()->total_cart) }}</h1>
                <button type="button" onclick="proccess()"
                    class="w-full px-6 py-3 bg-blue-500 rounded focus:outline-none hover:bg-blue-600 text-white uppercase font-medium my-3">Proses
                    Transaksi</button>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    function proccess() {
        $('#loadingScreen').removeClass('hidden');
        $.ajax({
                type: "POST",
                data: { },
                url: "{{ url('transactions') }}",
                success: function(data) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil, silahkan konfirmasi pembayaran ' + data.trim() + " ke admin",
                    }).then(function() {
                        window.location.href = "https://api.whatsapp.com/send?phone=6282247248902&text=Halo%20saya%20mau%20konfirmasi%20%20pembayaran%20pesanan%20" + data.trim();
                    })
                    $('#loadingScreen').addClass('hidden');
                },
                error: function(error) {
                    console.log(error.responseJSON);
                    Swal.fire({
                        backdrop: false,
                        heightAuto: false,
                        icon: 'error',
                        title: 'Gagal',
                        // text: error.responseJSON.error,
                    });
                    $('#loadingScreen').addClass('hidden');
                }
        });
    }
    function changeQuantity(id, e){
        $.ajax({
                type: "PUT",
                data: { quantity: e.target.value },
                url: "{{ url('carts/') }}/" + id,
                // processData: false,
                // contentType: false,
                success: function(data) {
                    $('#totalCart').html('Rp ' + Number(data.grand_total).toLocaleString());
                    $('#cart_' + id + " .total").html('Rp ' + Number(data.total).toLocaleString());
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Berhasil',
                    // })

                    // $('#loadingScreen').addClass('hidden');

                },
                error: function(error) {
                    console.log(error.responseJSON);
                    Swal.fire({
                        backdrop: false,
                        heightAuto: false,
                        icon: 'error',
                        title: 'Server Error atau Cart melebihi produk stock',
                        // text: error.responseJSON.error,
                    });
                }
            });
    }
    $('.deleteCartForm').on('submit', function(e) {
            e.preventDefault();
            $('#loadingScreen').removeClass('hidden');
            var dataId = $(this).data('id');
            $.ajax({
                type: "DELETE",
                data: $(this).serializeArray(),
                url: $(this).attr('action'),
                // processData: false,
                // contentType: false,
                success: function(data) {
                    $(this).children('button').removeClass('opacity-50 pointer-envents-none');
                    console.log(dataId);

                    $('#cart_' + dataId).remove();

                    // window.open(printURL + '/' + data.invoice.invoice_number, '_blank');
                    $('#cartCount').html(Number(data.count));
                    $('#cartCountDesktop').html(Number(data.count));
                    $('#totalCart').html('Rp ' + Number(data.total).toLocaleString());
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                    })
                    $('#loadingScreen').addClass('hidden');

                },
                error: function(error) {
                    console.log(error.responseJSON);
                    Swal.fire({
                        backdrop: false,
                        heightAuto: false,
                        icon: 'error',
                        title: 'Gagal',
                        // text: error.responseJSON.error,
                    });
                    $('#loadingScreen').addClass('hidden');
                    $(this).children('button').removeClass('opacity-50 pointer-envents-none');
                }
            })
        });
</script>
@endsection
