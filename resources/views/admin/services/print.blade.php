@extends('layouts.print-master')

@section('title')
Transaksi
@endsection

@section('content')
<section class="invoice-info">
    <div class="invoice-info__retail">
        Alamat: Jalan Akasia XVI A No 40 Denpasar Gang Melati<br>
        <strong>WA:</strong> 082247248902 <br>
        <strong>Telepon:</strong> 082247248902 <br>
        <div style="border-bottom: 1px solid #eaeaea; width: 60%; margin-top: 5px; margin-bottom: 5px;"></div>
        No. <strong>#{{ 'SRV'. strtotime($service->date) }}</strong> <br>
    </div>
    <div class="invoice-info__customer">
        <strong>{{ date('l, d F Y', strtotime($service->date)) }}</strong> <br>
        Kpd. {{ $service->user_name}}<br>
        No. HP: {{ $service->user_telp}}<br>
        Alamat: {{ $service->user_address}}
    </div>
</section>
<table class="transaction-table" v-align="top">
    <tr>
        <th class="align-top transaction-table__thead" style="text-align: left !important; padding: 5px 8px">Nama Barang</th>
        <td class="align-top" style="width:10px">:</td>
        <td class="align-top">{{ $service->product}}</td>
    </tr>
    <tr>
        <th class="align-top transaction-table__thead" style="text-align: left !important; padding: 5px 8px">Jenis Kerusakan</th>
        <td class="align-top" style="width:10px">:</td>
        <td class="align-top">{{ $service->type}}</td>
    </tr>
    <tr>
        <th class="align-top transaction-table__thead" style="text-align: left !important; padding: 5px 8px">Biaya</th>
        <td class="align-top" style="width:10px">:</td>
        <td class="align-top">{{ $service->cost != null ? 'Rp.' . number_format($service->cost, 0, ',', '.') : '-' }}</td>
    </tr>
    <tr>
        <th class="align-top transaction-table__thead" style="text-align: left !important; padding: 5px 8px">Deskripsi</th>
        <td class="align-top" style="width:10px">:</td>
        <td class="align-top">{!! $service->description !!}</td>
    </tr>
</table>
    <p>#Note : Jika ada perubahan biaya nanti akan dihubungi lebih lanjut.</p>
    <table style="width: 100%">
    <tr>
        <td>
        Customer
        <br>
        <br>
        <br>
        {{ $service->user_name}}
        </td>
        <td>
        Mengetahui
        <br>
        <br>
        <br>
        ____________
        </td>
    </tr>
<table>
@endsection

