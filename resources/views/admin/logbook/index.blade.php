@extends('admin.layouts.main')
@if (Session::has('error_message'))
<div class="pt-2">
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span>{{ Session::get('error_message') }}</span>
    </div>
    </div>
@endif
@if (Session::has('success_message'))
<div class="pt-2">
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span>{{ Session::get('success_message') }}</span>
    </div>
    </div>
@endif

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Start kode untuk form pencarian -->
                        <form class="form" method="get" action="{{ route('logbook/search') }}">
                            <div class="form-group w-100 mb-3">
                                <label for="search" class="d-block mr-2 mb-1">Cari</label>
                                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan tanggal">
                                     <button type="submit" class="btn btn-success mb-1">Cari</button>
                            </div>
                        </form>
                    <!-- Start kode untuk form pencarian -->
                    @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                        <p>{{ $message }}</p>
                     </div>
                    @endif
                    <a href="{{route('logbook.create')}}" class="btn btn-success mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>username</th>
                            <th>tanggal</th>
                            <th>laporan harian</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logbook as $key => $lb)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$lb->users->name}}</td>
                                <td>{{$lb->tanggal}}</td>
                                <td>{{$lb->laporan_harian}}</td>
                                
                                <td>
                                    <a href="{{route('logbook.edit', $lb)}}" class="btn btn-success btn-xs">
                                        Edit
                                    </a>
                                    <form class='d-inline' action="{{route('logbook.destroy', $lb)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                    <div class=mt-2>
                        Current Page : {{ $logbook->currentPage() }} <br>
                        Jumlah Data : {{ $logbook->total() }} <br>
                        Data perhalaman : {{ $logbook->perPage() }} <br>
                        {{ $logbook->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
