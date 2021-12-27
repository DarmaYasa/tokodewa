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
        No. <strong>#{{ $transaction->code }}</strong> <br>
    </div>
    <div class="invoice-info__customer">
        <strong>{{ date('d/M/Y') }}</strong> <br>
        Kpd. {{ $transaction->user->name }}<br>
        No. HP: {{ $transaction->user->telp }}<br>
        Alamat: {{ $transaction->user->address }}
    </div>
</section>
<table class="transaction-table">
    <thead class="transaction-table__thead">
        <tr>
            <th style="text-align: center">#</th>
            <th>Qty Barang</th>
            <th>Nama</th>
            <th>Harga Satuan</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaction->details as $detail)
            <tr>
                <td style="width: 1%; text-align: center">{{ $loop->iteration }}</td>
                <td style="width: 10%">{{ floatval($detail->quantity) . ' pcs' }}</td>
                <td style="width: 49%">{{ $detail->product->name }}</td>
                <td style="text-align: right; width: 20%">{{ 'Rp ' . number_format($detail->product->price, 2, ',', '.') }}</td>
                <td style="text-align: right; width: 20%">{{ 'Rp ' . number_format($detail->total, 2, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<section style="display: flex; justify-content: flex-end; width: 100%; margin-top: 20px">
    <div style="width: auto">
        <table>
            <tr>
                <td style="text-align: right"><strong>Grand Total</strong></td>
                <td>: {{ 'Rp ' . number_format($transaction->grand_total, 2, ',', '.') }}</td>
            </tr>
        </table>

    </div>
</section>
<p>#Note : Barang yang sudah di beli tidak dapat ditukar atau kembalikan.</p>
    <table style="width: 100%">
    <tr>
        <td>
        Customer
        <br>
        <br>
        <br>
        {{ $transaction->user->name }}
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

