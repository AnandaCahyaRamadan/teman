@extends('admin.layouts.main')
@section('container')
    <form action="{{route('konsultasi.store')}}" method="post">
        @csrf
    <div class="row">
        <label for="search" class="d-block mr-2 mb-1">Tambah Data</label>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputKet">Pesan</label>
                        <input type="text" class="form-control @error('pesan') is-invalid @enderror" id="exampleInputKet" placeholder="pesan" name="pesan" value="{{old('pesan')}}">
                        @error('pesan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBal">Balasan</label>
                        <input type="text" class="form-control @error('balasan') is-invalid @enderror" id="exampleInputBal" placeholder="balasan" name="balasan" value="{{old('balasan')}}">
                        @error('balasan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="position-option">Username</label>
                        <select class="form-control" id="position-option" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{route('konsultasi.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop