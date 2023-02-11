@extends('layouts.main')
@section('careusel')
     <div class="container-fluid bg-danger py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Logbook</h1>
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

    <div class="section-title text-center position-relative pb-3 mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold text-danger text-uppercase">Logbook</h5>
        <h1 class="mb-0">Isi logbook sesuai tanggal kegiatan</h1>
    </div>
                <form action="/logbook/store" method="post">
                        @csrf
                          <div class="container mb-5 pb-5">
                                <div class="m-0">
                                    <div class="row">
                                        <div class="col-md-12 chat-header rounded-top p-0">
                                            <div class="row">
                                                <div class="col-md-7 user-detail pt-2 ">
                                                    <h6 class="h5 fw-bold " style="color:white">Logbook</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card-body">
                                                <small class="text-muted mb-2">*isi logbook sesuai tanggal kegiatan</small>
                                                <div class="form-group mb-2">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="tanggal" name="tanggal" value="{{old('tanggal')}}">
                                                    @error('tanggal') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="laporan_harian">Laporan Harian</label>
                                                    <textarea rows="3" type="text" class="form-control @error('laporan_harian') is-invalid @enderror" id="laporan_harian" placeholder="Ceritakan kegiatan hari ini, kendala dan juga hasilnya" name="laporan_harian" value="{{old('laporan_harian')}}"></textarea>
                                                    @error('laporan_harian') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group" hidden>
                                                    <label for="position-option">Username</label>
                                                    <select class="form-control" id="position-option" name="user_id">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-danger mt-2" type="submit">Kirim</button>
                                            </div>
                                            <div class="container mt-5">
                                                <table class="table table-hover table-bordered table-stripped " id="example2">
                                                    <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tanggal</th>
                                                        <th>Laporan Harian</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($logbook as $key => $lb)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$lb->tanggal}}</td>
                                                            <td>{{$lb->laporan_harian}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                           
                                    </div>
                                </div>
                          </div>
                </form>
@endsection



