@extends('layouts.admin-master')

@section('title')
Input Service
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
            <a href="{{ route('admin.services.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Input Service</h1>
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
                        <h4>Input Service</h4>
                    </div>
                    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Tanggal</label>
                                <input type="text"
                                    class="form-control datetimepicker @error('date') is-invalid @enderror" name="date"
                                    value="{{ old('date') }}">
                                @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Pelanggan</label>
                                <select name="user_id"
                                    class="custom-select select2 @error('user_id') is-invalid @enderror">
                                    <option disabled @if(old('user_id')==null) selected @endif>-Pilih-</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" data-name="{{ $user->name }}"
                                        data-address="{{ $user->address }}" data-telp="{{ $user->telp }}"
                                        @if(old('user_id')==$user->id ) selected
                                        @endif>{{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Nama Barang</label>
                                <input type="text" class="form-control @error('product') is-invalid @enderror"
                                    name="product" value="{{ old('product') }}">
                                @error('product')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Jenis Kerusakan</label>
                                <select name="type" class="custom-select select2 @error('type') is-invalid @enderror">
                                    <option disabled @if(old('type')==null) selected @endif>-Pilih-</option>
                                    <option value="Service" @if(old('type')=='Service' ) selected @endif>Service
                                    </option>
                                    <option value="Warranty" @if(old('type')=='Warranty' ) selected @endif>Warranty
                                    </option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Cost</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="number" name="cost" class="form-control" value="{{ old('cost') }}">
                                </div>
                                @error('cost')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Telp</label>
                                <input type="tel" class="form-control @error('telp') is-invalid @enderror" name="telp"
                                    value="{{ old('telp') }}">
                                @error('telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Alamat</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                    name="address">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Description</label>
                                <textarea class="summernote @error('description') is-invalid @enderror"
                                    name="description">{!! old('description') !!}</textarea>
                                @error('description')
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

<script>
    $('select[name="user_id"]').change(function() {
        let selectedEl = $(this).children(':selected');
        $('input[name="name"]').val(selectedEl.data('name'));
        $('textarea[name="address"]').val(selectedEl.data('address'));
        $('input[name="telp"]').val(selectedEl.data('telp'));
    })
</script>

@endsection
