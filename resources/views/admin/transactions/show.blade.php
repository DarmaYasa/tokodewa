@extends('layouts.admin-master')

@section('title')
Manajemen Transaksi
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.transactions.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Manajemen Transaksi</h1>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Transaksi</h2>
                            <div class="invoice-number">#{{ $transaction->code }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Pelanggan:</strong><br>
                                    {{ $transaction->user->name }}<br>
                                    {{ $transaction->user->address }}<br>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Pembayaran:</strong><br>
                                    {{ $transaction->paid ? 'Sudah Dibayar' : 'Belum Dibayar' }}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Tanggal transaksi:</strong><br>
                                    {{ $transaction->date }}<br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Detail Transaksi</div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tbody>
                                    <tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Barang</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Kuantiti</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    @foreach ($transaction->details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->product->name }}</td>
                                            <td class="text-center">{{ 'Rp' . number_format($detail->price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $detail->quantity }}</td>
                                            <td class="text-right">{{ 'Rp' . number_format($detail->total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-8">

                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Subtotal</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg">{{ $transaction->grand_total }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                    <form action="{{ route('admin.transactions.update', $transaction->id) }}" class="inline">
                        <button class="btn btn-success btn-icon icon-left"><i class="fas fa-credit-card"></i> Konfirmasi Pembayaran & Proses</button>
                    </form>
                    <a href="{{ route('admin.transactions.index') }}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</a>
                </div>
                {{-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> --}}
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection
