@extends('layouts.main')
@section('careusel')
<div class="container-fluid bg-primary py-5 bg-header">
@endsection
@section('content')
<div class="card-title text-center flex-fill">
    <div class="mb-5 mt-5">
        <div class="container">
             <div class="row justify-content-center">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h1 class="mb-0">Verifikasi Email</h1>
                </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div>
                                    Verifikasi Email Anda
                                </div>
                                {{-- <div>
                                    {{ Auth::user()->email}}
                                </div> --}}
                            </div>
                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        Link baru telah dikirim ke email anda
                                    </div>
                                @endif
                                Sebelum melanjutkan, periksa email Anda untuk tautan verifikasi. Tunggu email tersebut 1-5 menit, jika tidak mendapat email, klik tautan dibawah
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline mt-2 text-danger">klik di sini untuk meminta yang lain</button>.
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

