@extends('layouts.admin-master')

@section('title')
Manajemen Service
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Manajemen Service</h1>
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
                        <h4>List Services</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
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
                                        <th>Jenis Kerusakan</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $key => $service)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $service->date }}</td>
                                        <td>{{ $service->user_name }}</td>
                                        <td>{{ $service->product }}</td>
                                        <td>{{ $service->type }}</td>
                                        <td>{{ $service->user_address }}</td>
                                        <td>{{ $service->user_telp }}</td>
                                        <td>
                                            <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-info">Detail</a>
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
