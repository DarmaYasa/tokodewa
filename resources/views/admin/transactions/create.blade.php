@extends('layouts.admin-master')

@section('title')
Add Transactions
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
            <a href="{{ route('services.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Add Transactions</h1>
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
                        <h4>Input Transactions</h4>
                    </div>
                    <form action="{{ url('dashboard/transactions') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required">Product</label>
                                <div class="input-group">
                                    <select name="product" class="custom-select select2 @error('product') is-invalid @enderror">
                                        <option disabled @if(old('product') == null) selected @endif>-Pilih-</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-id="{{ $product->id }}" data-price="{{ $product->price }}" data-qty="{{ $product->qty }}" @if($product->qty == 0) disabled @endif>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="add">+</button>
                                    </div>
                                </div>
                                @error('product')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="data-updated">
                
                                </tbody>
                            </table>
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
    $(document).ready(function() {
    var no = 0;
    let number = 0;
        $('button#add').click(function() {
            console.log('aaaa');
            let product_select = $('select[name="product"]');
            let product_id = product_select.children('option:selected').val();
            let product_price = product_select.children('option:selected').data('price');
            let product_qty = product_select.children('option:selected').data('qty');
            let product_name = product_select.children('option:selected').html();
            console.log(product_id);
            $('#data-updated').append(
                `<tr>
                    <td>
                        <input type="hidden" name="products[` + no + `][id]" value="` + product_id + `">` + ++number + ` 
                    </td>
                    <td> ` + product_name + ` </td>
                    <td> ` + product_price + `</td>
                    <td><input style="width: 100px !important" type="number" name="products[` + no + `][qty]" class="form-control" min="1" max="` + product_qty + `" onchange="generateTotal(this);"></td>
                    <td><input type="number" name="products[` + no + `][total]" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger remove" onclick="remove(this);">-</button></td>
                </tr>`
            );
            no++;
            console.log(no);
        });
    });

    function remove(element) {
        $(element).parents("tr").remove();
        console.log('asdasd');
    }

    function generateTotal(element) {
        let qty = $(element).val();
        let price = $(element).parent().prev().html();
        // let price = $(element).parent().prev().html();
        let total = qty * price;
        $(element).parent().next().children('input').val(total);
    }
</script>

@endsection