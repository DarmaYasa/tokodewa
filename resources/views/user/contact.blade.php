@extends('layouts.user-master')

@section('title')
Service
@endsection

@section('content')
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Kontak Kami</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Silahkan kirim pesan yang diinginkan</p>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <form id="contactForm" action="{{ route('contact.post') }}" method="POST">
                @csrf
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">Nama</label>
                        <input type="text" id="name" name="name" required value="{{ Auth::check() ? Auth::user()->name : '' }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" required value="{{ Auth::check() ? Auth::user()->email : '' }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="subject" class="leading-7 text-sm text-gray-600">Subjek</label>
                        <input type="text" id="subject" name="subject" required
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="message" class="leading-7 text-sm text-gray-600">Pesan</label>
                        <textarea id="message" name="message" required
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button
                        class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Kirim Pesan</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        $('#loadingScreen').removeClass('hidden');
        $(this).children('button').addClass('opacity-50 pointer-envents-none');
            $.ajax({
                type: "POST",
                data: $(this).serializeArray(),
                url: "{{ route('contact.post') }}",
                // processData: false,
                // contentType: false,
                success: function(data) {
                    $('#loadingScreen').addClass('hidden');
                    $(this).children('button').removeClass('opacity-50 pointer-envents-none');
                    Swal.fire({
                        icon: 'success',
                    })

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
