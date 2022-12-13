@extends('layouts.main')
@section('careusel')
     <div class="container-fluid bg-danger py-5 bg-header">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Konsultasi</h1>
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
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Membutuhkan Masukan Berwirausaha, Tanyakan Sekarang Juga</h1>
                    </div> <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-danger d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ps-4 mb-2">
                            <h5 class="mb-2">Email Kami</h5>
                            <h4 class="text-danger mb-0">temansemarang@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                      @if (session()->has('success_message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success_message') }}
                      <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';"></button>
                      </div>
                      @endif
                    <div class="bg-danger rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                           <form action="/konsultasi/store" method="post">
                          @csrf
                          <div class="form-group mt-3" hidden>
                            <select class="form-control" id="position-option" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                          </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Message" name="pesan" id="pesan" required></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Kirim Pertanyaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="text-align: justify text-dark"> 
                    <h5 class="mt-5 fw-bold">Balasan</h5>
                    @foreach($konsultasi as $key => $konsultasi)
                        <p class="mt-3"><b>Pertanyaan</b> : {{$konsultasi->pesan}}</p>
                        <p><b>Jawaban</b> :  {{$konsultasi->balasan}}</b></p>
                        <form class='d-inline' action="/konsultasi/hapus/{{ $konsultasi->id}}" method="post">
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger animated slideInLeft">Hapus</button>
                            </form>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
