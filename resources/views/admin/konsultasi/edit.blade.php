@extends('admin.layouts.main')
@section('container')
    <form action="{{route('konsultasi.update', $konsultasis)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <label for="search" class="d-block mr-2 mb-1">Edit </label>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputKet">Pesan</label>
                        <textarea rows="3" type="text" class="form-control @error('pesan') is-invalid @enderror" id="exampleInputKet" placeholder="pesan" name="pesan" value="{{$konsultasis->pesan ?? old('pesan')}}"></textarea>
                        @error('pesan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputbal">Balasan</label>
                        <textarea rows="3" type="text" class="form-control @error('balasan') is-invalid @enderror" id="exampleInputName" placeholder="balasan" name="balasan" value="{{$konsultasis->balasan ?? old('balasan')}}"></textarea>
                        @error('balasan') <span class="text-danger">{{$message}}</span> @enderror
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