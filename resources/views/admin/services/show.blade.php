@extends('layouts.admin-master')

@section('title')
Detail Service
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.services.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Manajemen Service</h1>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Service</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="" v-align="top">
                                    <tr>
                                        <th class="align-top">Tanggal</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{{ date('l, d F Y', strtotime($service->date)) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">Nama Pelanngan</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{{ $service->user_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">Nama Barang</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{{ $service->name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">Alamat</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{{ $service->user_address}}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">Telpon</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{{ $service->user_telp}}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">Jenis Kerusakan</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{{ $service->type}}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">Biaya</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{{ $service->cost != null ? 'Rp.' . number_format($service->cost, 0, ',', '.') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">Deskripsi</th>
                                        <td class="align-top" style="width:10px">:</td>
                                        <td class="align-top">{!! $service->description !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection

