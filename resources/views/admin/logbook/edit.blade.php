@extends('admin.layouts.main')
@section('container')
    <form action="{{route('logbook.update', $logbooks)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <label for="search" class="d-block mr-2 mb-1">Edit </label>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="tanggal" name="tanggal" value="{{$logbooks->tanggal ?? old(',tanggal')}}">
                        @error('tanggal') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="laporan_harian">Laporan Harian</label>
                        <textarea rows="3" type="text" class="form-control @error('laporan_harian') is-invalid @enderror" id="laporan_harian" placeholder="laporan_harian" name="laporan_harian" value="{{old('laporan_harian')}}">{{ old('laporan_harian', $logbooks->laporan_harian) }}</textarea>
                        @error('laporan_harian') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{route('logbook.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop