@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pendaftaran</h1>
  </div>
  @if (session()->has('success_message'))
  <div class="alert alert-success" role="alert">
  {{ session('success_message') }}
  </div>
  @endif
    <div class="table-responsive">
                    <!-- Start kode untuk form pencarian -->
                        <form class="form" method="get" action="{{ route('pendaftaran/search') }}">
                            <div class="form-group w-100 mb-3">
                                <label for="search" class="d-block mr-2 mb-1">Cari</label>
                                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan telepon ">
                                     <button type="submit" class="btn btn-success mb-1">Cari</button>
                            </div>
                        </form>
                    <!-- Start kode untuk form pencarian -->
                    @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                        <p>{{ $message }}</p>
                     </div>
                    @endif
                    <a href="{{route('pendaftaran.create')}}" class="btn btn-success mb-2">
                        Tambah
                    </a>
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>File</th>
                            <th>Telepon</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Penjadwalan</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pendaftarans as $key => $pendaftaran)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $pendaftaran->file )}}" class="badge bg-success" type="submit"><i class='bx bxs-download'></i></a>
                                </td>
                                <td>{{$pendaftaran->telepon}}</td>
                                <td>{{$pendaftaran->users->name}}</td>
                                <td>{{$pendaftaran->status}}</td>
                                <td>{{$pendaftaran->penjadwalan}}</td>
                                <td>
                                    <a href="{{route('pendaftaran.edit', $pendaftaran)}}" class="badge bg-warning"><i class='bx bxs-edit'></i>
                                    </a>
                                    <form class='d-inline' action="{{route('pendaftaran.destroy', $pendaftaran)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class='bx bx-x-circle'></i></button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                    <div class=mt-2>
                        Current Page : {{ $pendaftarans->currentPage() }} <br>
                        Jumlah Data : {{ $pendaftarans->total() }} <br>
                        Data perhalaman : {{ $pendaftarans->perPage() }} <br>
                        {{ $pendaftarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
