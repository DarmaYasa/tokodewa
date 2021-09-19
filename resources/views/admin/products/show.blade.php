@extends('layouts.admin-master')

@section('title')
Detail {{ $product->name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('products.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Product Management</h1>
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
                        <h4>Detail Product</h4>
                        <div class="card-header-action">
                            <a href="{{ action('ProductController@edit', $product->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ action('ProductController@destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                            <img class="w-100" src="{{ asset('upload/products/' . $product->image)}}" alt="Profile {{ $product->name }}">
                            </div> 
                            <div class="col-12 col-md-8">
                                <h4 class="text-dark">
                                    {{ $product->name }}
                                    {{-- Nama Product --}}
                                </h4>
                                <p>
                                    {{ 'Rp.'.number_format($product->price, 0, ',', '.') }} / Warranty {{ $product->warranty . ' bulan' }}
                                </p>
                                <h6 class="text-dark">
                                    Description
                                </h6>
                                <p>
                                    {!! $product->description !!}
                                </p>
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

