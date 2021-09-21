@extends('layouts.admin-master')

@section('title')
Edit Produk
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
            <a href="{{ route('admin.products.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Produk</h1>
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
                        <h4>Form Produk</h4>
                    </div>
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Nama Produk</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Jenis Produk</label>
                                <select name="product_category_id" class="custom-select select2 @error('product_category_id') is-invalid @enderror">
                                    <option disabled @if(old('product_category_id', $product->product_category_id) == null) selected @endif>-Pilih-</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if(old('product_category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Kuantiti</label>
                                <input type="number" min="1" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                                @error('quantity')
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
                                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                                </div>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Description</label>
                                <textarea class="summernote @error('description') is-invalid @enderror" name="description" >{!! old('description', $product->description) !!}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Image</label><br>
                                <img src="{{ $product->thumbnail_url }}" style="width: 250px">
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
