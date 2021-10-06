@extends('layouts.admin-master')

@section('title')
Manajemen Transaksi
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Manajemen Transaksi</h1>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Transaksi</h4>
                        <div class="card-header-action">
                            {{-- <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus fa-fw"></i> Tambah Data
                            </a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table nowrap" id="data">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Tanggal</th>
                                        <th>Kode</th>
                                        <th>User</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $key => $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('l, d F Y', strtotime($transaction->date)) }}</td>
                                        <td>{{ $transaction->code }}
                                        <hr style="border-bottom: 2px solid {{ $transaction->paid ? '#47c363' : '#fc544b' }}"></td>
                                        <td>
                                            <ul>
                                                @foreach ($transaction->details as $detail)
                                                    <li>{{ $detail->product->name . ' x' . $detail->quantity }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ 'Rp.'.number_format($transaction->grand_total, 0, '.', ',') }}</td>
                                        <td>
                                            <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $('#data').dataTable({
        'columnDefs': [
            {'targets' : 0,'width' : '1%',},
            {'targets' : -1,'width' : '1%',},
        ]
    });
</script>
@endsection
