@extends('layouts.main')
@section('careusel')
<div class="container-fluid bg-danger py-5 bg-header">
@endsection
@section('content')
      <div class="card-img d-flex align-items-center">
        <div class="card-title text-center flex-fill">
            <div class="container pb-2">
              <div class="row justify-content-center">
              <div class="col-lg-5">
              <main class="form-registration">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                  <h1 class="mb-0 pt-5">Register</h1>
                </div>
                <form action="{{ route('register') }}" method="post">
                  @csrf
                    <div class="form-floating mb-2">
                        <input type="text" name='name' class="form-control rounded-top @error('name') is-invalid" @enderror id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Username</label>
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
    
                    <div class="form-floating mb-2">
                      <input type="email" name='email' class="form-control @error('email') is-invalid" @enderror id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                      <label for="email">Email address</label>
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div> 
                      @enderror
                    </div>
                  <div class="form-floating mb-2">
                    <input type="password" name='password' class="form-control rounded-bottom @error('password') is-invalid" @enderror  id="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div> 
                    @enderror
                  </div>
                  <div class="form-floating mb-2">
                    <input type="password" name='password_confirmation' class="form-control rounded-bottom @error('password') is-invalid" @enderror  id="password" placeholder="Retype-Password">
                    <label for="password_confirmation">Re-Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div> 
                    @enderror
                  </div>
                  <p class="d-block text-center mt-1">
                    Already registered? <a href="{{ route('login') }}" class="text-danger">Login</a>
                 </p>
                  <div class="text-center">
                  <button class="btn btn-danger py-md-3 px-md-5 animated slideInLeft mb-5" type="submit">Register</button>
                  </div>
                </form>
              </main>
            </div>
        </div>
    </div>
        
    </div>
</div>

@endsection