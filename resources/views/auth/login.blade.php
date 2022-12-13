@extends('layouts.main')
@section('careusel')
<div class="container-fluid bg-danger py-5 bg-header">
@endsection
@section('content')
      <div class="d-flex align-items-center">
        <div class="card-title text-center flex-fill">
            <div class="container mt-5">
              <div class="row justify-content-center ">
              <div class="col-md-5">
              <main class="form-signin">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                  <h1 class="mb-0">Login</h1>
                </div>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control @error('email') is-invalid" @enderror id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                  <small> {{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                  </div>
                  <span>
                    Not registered? <a href="{{ route('register') }}" class="text-danger">registered</a>
                  </span>
                  @if (Route::has('password.request'))
                  <a class="btn btn-link text-decoration-none d-flex justify-content-center text-danger" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                  @endif

                  <div class="text-center pt-2 mb-5">
                  <button class="btn btn-danger py-md-3 px-md-5  animated slideInLeft" type="submit">Login</button>
                 </div>
                </form>
              </main>
            </div>
        </div>
    </div>

        
    </div>
</div>

@endsection