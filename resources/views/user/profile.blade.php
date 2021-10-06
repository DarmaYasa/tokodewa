@extends('layouts.user-master')

@section('title')
Profile User
@endsection

@section('content')
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <h1 class="font-bold text-2xl text-center mb-2">Update Profile</h1>
        <div class="bg-white shadow rounded p-5 w-full lg:w-2/3 mx-auto">
            <form action="{{ url('profile') }}" method="POST">
                @csrf
                @if (session('success'))
                <div class="p-3 rounded-sm text-white bg-green-500">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="p-3 rounded-sm text-white bg-red-400">
                    {{ session('error') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="bg-red-400 text-white rounded-sm p-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="telp" class="leading-7 text-sm text-gray-600">Telp</label>
                            <input type="tel" id="telp" name="telp" value="{{ old('telp', Auth::user()->telp) }}" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="old_password" class="leading-7 text-sm text-gray-600">Password Lama</label>
                            <input type="password" id="old_password" name="old_password" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="password_confirmation" class="leading-7 text-sm text-gray-600">Konfirmasi
                                Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="address" class="leading-7 text-sm text-gray-600">Alamat</label>
                            <textarea id="address" name="address" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('address', Auth::user()->address) }}</textarea>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Simpan</button>
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
