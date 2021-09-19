@extends('layouts.admin-master')

@section('title')
Transactions Management
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Transactions Management</h1>
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
                        <h4>List Transactions</h4>
                        <div class="card-header-action">
                            <a href="{{ route('transactions.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus fa-fw"></i> Tambah Data
                            </a>
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
                                        <th>Nama</th>
                                        <th>Barang</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $key => $transaction)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ date('l, d F Y', strtotime($transaction->date)) }}</td>
                                        <td>{{ $transaction->name }}</td>
                                        <td>
                                            <ul>
                                                @foreach (explode(',', $transaction->products) as $product)
                                                    <li>{{ $product }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ 'Rp.'.number_format($transaction->total, 0, '.', ',') }}</td>
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