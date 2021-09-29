@extends('layouts.user-master')

@section('title')
Home
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Home</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 mb-4 h-100">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class=""></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div style="height: 500px !important" class="carousel-item">
                            <img class="d-block w-100" style="object-fit: cover" src="assets/img/news/img01.jpg"
                                alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Heading</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div style="height: 500px !important" class="carousel-item active">
                            <img class="d-block w-100" style="object-fit: cover" src="assets/img/news/img07.jpg"
                                alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Heading</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div style="height: 500px !important" class="carousel-item">
                            <img class="d-block w-100" style="object-fit: cover" src="assets/img/news/img08.jpg"
                                alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Heading</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>My Picture</h4>
                    </div> --}}
                    <div class="card-body" style="padding: 0 !important; height: auto !important    ">
                        <img alt="image" src="assets/img/example-image.jpg" class="img-fluid mb-2 rounded">
                        <div class="p-3">
                            <h6>My Picture</h6>
                            <div class="mb-2 text-muted">Click the picture below to see the magic!</div>
                            <div class="d-flex justify-content-end">
                                <a href="" class="btn btn-primary text-right">Lihat Produk <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
