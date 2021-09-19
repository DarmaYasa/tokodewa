@extends('layouts.admin-master')

@section('title')
Add Product
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modules/iziToast/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('products.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Add Product</h1>
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
                        <h4>Input Product</h4>
                    </div>
                    <form action="{{ url('dashboard/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Nama Produk</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Jenis Produk</label>
                                <select name="type" class="custom-select select2 @error('type') is-invalid @enderror">
                                    <option disabled @if(old('type') == null) selected @endif>-Pilih-</option>
                                    <option value="Laptop" @if(old('type') == 'Laptop') selected @endif>Laptop</option>
                                    <option value="Accessories" @if(old('type') == 'Accessories') selected @endif>Accessories</option>
                                    <option value="Pheriperal" @if(old('type') == 'Pheriperal') selected @endif>Pheriperal</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Qty</label>
                                <input type="number" min="1" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}">
                                @error('qty')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          Rp
                                        </div>
                                      </div>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                </div>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warranty</label>
                                <div class="input-group">
                                    <input type="number" name="warranty" class="form-control" value="{{ old('warranty') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            bulan
                                        </div>
                                        </div>
                                </div>
                                @error('warranty')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Description</label>
                                <textarea class="summernote @error('description') is-invalid @enderror" name="description" >{!! old('description') !!}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                @error('image')
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
<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/modules/iziToast/js/iziToast.js')}}"></script>
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/modules/summernote/summernote-bs4.js')}}"></script>

@endsection