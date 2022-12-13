@extends('layouts.main')
@section('careusel')
<div class="container-fluid bg-primary py-5 bg-header">
@endsection
@section('content')
<div class="card-title text-center flex-fill">
    <div style="mt-5 mb-5">
    <div class="container">
    <div class="row justify-content-center">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Konfirmasi Password</h1>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Konfirmasi Password</div>
                <div class="card-body">
                    <p>Konfirmasi password anda sebelum masuk </p>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
