<style>
    .card {
  --border-radius: 0.75rem;
  --primary-color: #7257fa;
  --secondary-color: #3c3852;
  padding: 1rem;
  cursor: pointer;
  border-radius: var(--border-radius);
  background: #f1f1f3;
  box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 3%);
  position: relative;
}

.card > * + * {
  margin-top: 1.1em;
}

.card .card__content {
  color: var(--secondary-color);
  font-size: 0.86rem;
}

.card .card__title {
  padding: 0;
  font-size: 1.3rem;
  font-weight: bold;
}

.card .card__date {
  color: #6e6b80;
}

.card .card__arrow {
  position: absolute;
  background: var(--primary-color);
  padding: 0.4rem;
  border-top-left-radius: var(--border-radius);
  border-bottom-right-radius: var(--border-radius);
  bottom: 0;
  right: 0;
  transition: 0.2s;
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>

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
        <h1 class="mb-0">Isi Logbook Sesuai Tanggal Kegiatan</h1>
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
                                                @foreach($logbook as $key => $lb)
                                                <div class="card mb-4">
                                                    <h3 class="card__title">Logbook hari ke - {{ $key+1 }}
                                                    </h3>
                                                    <p class="card__content">{{$lb->laporan_harian}}</p>
                                                    <div class="card__date">
                                                        {{ $lb->tanggal }}
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>                                           
                                    </div>
                                </div>
                          </div>
                </form>
@endsection



