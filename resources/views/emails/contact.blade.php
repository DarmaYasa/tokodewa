@component('mail::message')
# Pesan dari kontak form

Nama: {{ $name }} <br>
Email: {{ $email }} <br>
Subjek: {{ $subject }} <br>
Pesan: {{ $message }} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
