@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data</h1>
</div>
    <form action="{{route('pendaftaran.update', $pendaftarans)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-8">
                 <div class="mb-3">
                        <label for="file" class="form-label">Pilih File</label>
                        <input type="hidden" name="oldfile" value="{{ $pendaftarans->file  }}">
                        <input class="form-control @error('pendaftaran') is-invalid @enderror"  type="file" id="pendaftaran" name="file" value="{{ $pendaftarans->file  }}">
                        @error('pendaftaran')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                    <div class="mb-3">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="telepon" name="telepon" value="{{$pendaftarans->telepon ?? old('telepon')}}">
                        @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="status" name="status" value="{{$pendaftarans->status ?? old('status')}}">
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penjadwalan">Penjadwalan</label>
                        <input type="text" class="form-control @error('penjadwalan') is-invalid @enderror" id="penjadwalan" placeholder="penjadwalan" name="penjadwalan" value="{{$pendaftarans->penjadwalan ?? old('penjadwalan')}}">
                        @error('penjadwalan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{route('pendaftaran.index')}}" class="btn btn-default">
                        Batal
                    </a>
            </div>
    </form>
@stop