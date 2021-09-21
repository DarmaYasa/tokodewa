@extends('layouts.admin-master')

@section('title')
Manajemen Produk
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Manajemen Produk</h1>
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
                        <h4>List Produk</h4>
                        <div class="card-header-action">
                            {{-- <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" aria-expanded="true">{{ app('request')->input('by') != '' ? ucfirst(app('request')->input('by')) : 'Semua'}}</a> --}}
                            {{-- <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-125px, -201px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <li class="dropdown-title">Filter</li>
                            <li><a href="{{ route('products.index') }}?by=laptop" class="dropdown-item {{ app('request')->input('by') == 'laptop' ? 'active' : '' }}">Laptop</a></li>
                            <li><a href="{{ route('products.index') }}?by=accessories" class="dropdown-item {{ app('request')->input('by') == 'accessories' ? 'active' : '' }}">Accessories</a></li>
                            <li><a href="{{ route('products.index') }}?by=pheriperal" class="dropdown-item {{ app('request')->input('by') == 'pheriperal' ? 'active' : '' }}" >Pheripheral</a></li>
                            </ul> --}}
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
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
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Kuantiti</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->qty . ' pcs' }}</td>
                                        <td>{{ 'Rp.' . number_format($product->price, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">Detail</a>
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
