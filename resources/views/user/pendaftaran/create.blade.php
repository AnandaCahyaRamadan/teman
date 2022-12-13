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
  <h1 class="mb-0">Unggah Proposal</h1>
</div>
      <div class="card-img d-flex align-items-center ">
        <div class="card-title  flex-fill">
            <div class="container pb-2 ">
              <div class="row justify-content-center" >
              <div class="col-lg-6 ">
              <main class="form-registration" >
                <form action="/pendaftaran/store" method="post" enctype="multipart/form-data" >
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-top @error('telepon') is-invalid @enderror" id="telepon" placeholder="Masukkan no HP anda" name="telepon">
                    <label for="telepon">Masukkan Nomor Hp Anda</label>
                    @error('telepon')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                <div class="form-group">
                    <input class="form-control @error('file') is-invalid @enderror"  type="file" id="file" name="file">
                    @error('file')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group mt-3" hidden>
                    <select class="form-control" id="position-option" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div style="padding-bottom: 10%" class="text-center">
                  <button stype="submit" class="btn btn-danger py-md-3 px-md-5 mt-3 animated slideInLeft">Kirim</button>
                  </div>
                </form>
              </main>
            </div>
        </div>
    </div>
        
    </div>
</div>

@endsection