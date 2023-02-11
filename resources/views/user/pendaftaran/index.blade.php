@extends('layouts.main')
@section('careusel')
     <div class="container-fluid bg-danger py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Pendaftaran</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->
<div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
    <h5 class="fw-bold text-danger text-uppercase">Pendaftaran</h5>
    <h1 class="mb-0">Daftarkan Timmu Sekarang Juga</h1>
</div>
<div class="card-img d-flex align-items-center">
    <div class="card-title text-center flex-fill">
        <div class="container pb-2">
            <div>
                <img src="/img/bussines.jpg" alt="" width="40%">
            </div>
        <a href="/pendaftaran/create" class="btn btn-danger py-md-3 px-md-5 animated slideInLeft">Daftar Sekarang</a>

        <div class="text-center position-relative pb-3 mt-3 mb-5 mx-auto" style="max-width: 600px;">
            @foreach($pendaftarans as $key => $pendaftaran)
            <h3 class="mt-5">STATUS PENDAFTARAN</h3>
            <h5 class="fw-bold text-danger mt-3">{{$pendaftaran->status}}</h5>
                <h5 class="fw-bold text-success">{{$pendaftaran->penjadwalan}}</b></h5>
            @endforeach
        </div>
        </div>
        <div>
        </div>  
    </div>
    </div>
</div>
@endsection
