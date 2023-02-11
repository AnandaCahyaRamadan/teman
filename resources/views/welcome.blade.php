@extends('layouts.main')
@section('careusel')
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/tenaga1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Tenaga Kerja Mandiri Kota Semarang</h1>
                            <h5 class="text-white text-uppercase mb-5 animated slideInDown">Dengan Website Teman Semarang, Pendaftaran Pembekalan Wirausaha Menjadi Lebih Mudah</h5>
                            <a href="{{ route('login') }}" class="btn btn-danger py-md-3 px-md-5 me-3 animated slideInLeft">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Register</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/tenaga2.jpeg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Tenaga Kerja Mandiri Kota Semarang</h1>
                            <h5 class="text-white text-uppercase mb-5 animated slideInDown">Dengan Website Teman Semarang, Pendaftaran Pembekalan Wirausaha Menjadi Lebih Mudah</h5>
                            <a href="{{ route('login') }}" class="btn btn-danger py-md-3 px-md-5 me-3 animated slideInLeft">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
