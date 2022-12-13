@extends('admin.layouts.main')
@section('container')
    <form action="{{route('pendaftaran.update', $pendaftarans)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="row">
        <label for="search" class="d-block mr-2 mb-1">Edit </label>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="file" class="form-label">Pilih File</label>
                        <input type="hidden" name="oldfile" value="{{ $pendaftarans->file  }}">
                        <input class="form-control @error('pendaftaran') is-invalid @enderror"  type="file" id="pendaftaran" name="file" value="{{ $pendaftarans->file  }}">
                        @error('pendaftaran')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="telepon" name="telepon" value="{{$pendaftarans->telepon ?? old('telepon')}}">
                        @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="position-option">Username</label>
                        <select class="form-control" id="position-option" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="status" name="status" value="{{$pendaftarans->status ?? old('status')}}">
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="penjadwalan">Penjadwalan</label>
                        <input type="text" class="form-control @error('penjadwalan') is-invalid @enderror" id="penjadwalan" placeholder="penjadwalan" name="penjadwalan" value="{{$pendaftarans->penjadwalan ?? old('penjadwalan')}}">
                        @error('penjadwalan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{route('pendaftaran.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop