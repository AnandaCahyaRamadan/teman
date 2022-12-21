<style>
    .chat-header{
        background:  rgba(220, 53, 69, 1);
    }
    
    .user-detail h6{
        display: inline-block;
    }
    .options i{
        color: #a1a1a1;
        font-size: 19px;
        cursor: pointer;
    }
    .chat-content, .chat-content .sender, .user-detail h6{
        font-size: 14px;
    }
    .chat-content dl{
        height: 260px;
        overflow-x: scroll;
        overflow-x: hidden;
    }
    .chat-content dl li{
        list-style: none;
      
    }
    .chat-content .msg-box{
        background: #e1e1e1;
    }
    .chat-content .time{
        font-size: 10px;
    }
    </style>
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
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <form action="/konsultasi/store" method="post">
                          @csrf
                          <div class="form-group mt-3" hidden>
                            <select class="form-control" id="position-option" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="container">
                            <div class="pt-3">
                                <div class="m-0 chat-main">
                                    <div class="row">
                                        <div class="col-md-12 chat-header rounded-top p-2">
                                            <div class="row">
                                                <div class="col-md-7 user-detail pt-2 ">
                                                    <h6 class="h5 fw-bold " style="color:white">Konsultasi</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12  chat-content p-0 bg-white border border-top-0">
                                            <dl class="pl-3 pr-3 pt-1 mb-1 ">
                                                @foreach($konsultasi as $key => $konsultasi)
                                                <li class="p-2 mb-1 rounded">
                                                    <div class="d-flex flex-row justify-content-end mb-1">
                                                        <div class="p-3 me-3 border" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                                          <p class="small mb-0">{{ $konsultasi->pesan }}</p>
                                                        </div>
                                                        <img src="/img/you.png"
                                                          alt="avatar 1" style="width: 45px; height: 100%;">
                                                      </div>
                                                </li>  
                                                <li class="p-2 mb-1 rounded">
                                                    <div class="d-flex flex-row justify-content-start mb-1">
                                                        <img src="/img/admin.png"
                                                          alt="avatar 1" style="width: 45px; height: 100%;">
                                                        <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(225, 235, 239, 0.2);">
                                                          <p class="small mb-0">{{ $konsultasi->balasan }}</p>
                                                        </div>
                                                      </div>
                                                </li>  
                                                @endforeach                                               
                                            </dl> 
                                            <div class="p-2">
                                                <div class="row">
                                                    <div>
                                                        <textarea type="text" class="form-control" placeholder="message ..." name="pesan"></textarea>
                                                        <button class="btn btn-danger mt-2" type="submit">Kirim</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
