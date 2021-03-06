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
                Login
            </h2>
            <a href="{{ route('register') }}" class="text-blue-600 text-center w-full block mt-2">Daftar</a>
        </div>
        <form class="mt-8 p-5 bg-white" action="#" method="POST">
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
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>

                {{-- <div class="text-sm">
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                        Forgot your password?
                    </a>
                </div> --}}
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-6 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: solid/lock-closed -->
                        <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

</html>
