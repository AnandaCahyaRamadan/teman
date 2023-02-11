@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data</h1>
</div>
<div class="col-md-8">
    <form action="{{route('pendaftaran.store')}}" method="post" enctype="multipart/form-data">
        @csrf
                    <div class="mb-3">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="telepon" name="telepon" value="{{old('telepon')}}">
                        @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">Masukkan file</label>
                        <input class="form-control @error('file') is-invalid @enderror"  type="file" id="file" name="file">
                        @error('file')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                    <div class="mb-3">
                        <label for="position-option">Username</label>
                        <select class="form-control" id="position-option" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="status" name="status" value="{{old('status')}}">
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penjadwalan">Penjadwalan</label>
                        <input type="text" class="form-control @error('penjadwalan') is-invalid @enderror" id="penjadwalan" placeholder="penjadwalan" name="penjadwalan" value="{{old('penjadwalan')}}">
                        @error('penjadwalan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{route('pendaftaran.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
    </form>
</div>
@stop