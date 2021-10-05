@extends('layouts.admin-master')

@section('title')
Edit User
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.users.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit User</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Informasi</h2>
        <p class="section-lead">
            Field dengan asterisk(*) wajib diisi
            <br>
            Silahkan pilih salah satu,pilih customer atau masukkan manual data customer
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User</h4>
                    </div>
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Telp</label>
                                <input type="tel" class="form-control @error('telp') is-invalid @enderror" name="telp"
                                    value="{{ old('telp', $user->telp) }}">
                                @error('telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Alamat</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                    name="address">{{ old('address', $user->address) }}</textarea>
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
