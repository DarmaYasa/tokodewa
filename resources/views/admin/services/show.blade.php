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
            <a href="{{ route('services.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Services Management</h1>
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
                            <a href="{{ action('ServiceController@edit', $service->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ action('ServiceController@destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-12">
                                <table class="table table-striped" v-align="top">
                                    <tr>
                                        <th>Tanggal</th>
                                        <td style="width:10px">:</td>
                                        <td>{{ date('l, d F Y', strtotime($service->date)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pelanngan</th>
                                        <td style="width:10px">:</td>
                                        <td>{{ $service->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <td style="width:10px">:</td>
                                        <td>{{ $service->stuff}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td style="width:10px">:</td>
                                        <td>{{ $service->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Telpon</th>
                                        <td style="width:10px">:</td>
                                        <td>{{ $service->telp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kerusakan</th>
                                        <td style="width:10px">:</td>
                                        <td>{{ $service->type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Biaya</th>
                                        <td style="width:10px">:</td>
                                        <td>{{ $service->cost != null ? 'Rp.' . number_format($service->cost, 0, ',', '.') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td style="width:10px">:</td>
                                        <td>{!! $service->description !!}</td>
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

