@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data</h1>
</div>
    <form action="{{route('logbook.store')}}" method="post">
        @csrf
        <div class="col-md-8">
                    <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="tanggal" name="tanggal" value="{{old('tanggal')}}">
                        @error('tanggal') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="laporan_harian">Laporan Harian</label>
                        <textarea rows="3" type="text" class="form-control @error('laporan_harian') is-invalid @enderror" id="laporan_harian" placeholder="laporan harian" name="laporan_harian" value="{{old('laporan_harian')}}"></textarea>
                        @error('laporan_harian') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="position-option">Username</label>
                        <select class="form-control" id="position-option" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{route('logbook.index')}}" class="btn btn-default">
                        Batal
                    </a>
        </div>
    </form>
@stop