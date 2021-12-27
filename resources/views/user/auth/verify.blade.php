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
        </div>
        <div class="p-3 bg-white rounded-md">
            @if (session('resent'))
                <div class="p-3 rounded-sm text-white bg-green-500" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <form method="POST" action="{{ route('verification.resend') }}" class="inline">@csrf<button>{{ __('click here to request another') }}</button></form>.
        </div>
    </div>
</div>

</html>
