@extends('layouts.admin-master')

@section('title')
Profile Admin
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Profile Admin</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Informasi</h2>
        <p class="section-lead">
            Field dengan asterisk(*) wajib diisi
        </p>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Admin</h4>
                    </div>
                    <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <div class="bg-red-400 text-white rounded-sm">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $admin->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $admin->email) }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Password Lama</label>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                    name="old_password">
                                @error('old_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Konfirmasi Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Telp</label>
                                <input type="tel" class="form-control @error('telp') is-invalid @enderror" name="telp"
                                    value="{{ old('telp', $admin->telp) }}">
                                @error('telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Alamat</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                    name="address">{{ old('address', $admin->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/modules/summernote/summernote-bs4.js')}}"></script>

@endsection
