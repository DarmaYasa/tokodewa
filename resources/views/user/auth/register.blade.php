<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body>

</body>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto h-16 w-auto" src="{{ asset('img/logo.png') }}" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                Register
            </h2>
        </div>
        <form method="POST" action="{{ route('register') }}" class="mt-8 p-5 bg-white">
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
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm">
                <div class="mb-4">
                    <label for="name" class="">Name</label>
                    <input id="name" name="name" type="text" required
                        class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Name">
                </div>
                <div class="mb-4">
                    <label for="email-address" class="">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Email address">
                </div>
                <div class="mb-4">
                    <label for="password" class="">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Password">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Konfirmasi Password">
                </div>
                <div class="mb-4">
                    <label for="address" class="">Alamat</label>
                    <textarea id="address" name="address" required
                        class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Address"></textarea>
                </div>
                <div class="mb-4">
                    <label for="telp" class="">Telepon</label>
                    <input id="telp" name="telp" type="text" required
                        class="appearance-none rounded relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Telepon">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-6 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

</html>
