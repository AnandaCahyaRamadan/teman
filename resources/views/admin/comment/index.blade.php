@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Komentar</h1>
  </div>
  @if (session()->has('success_message'))
  <div class="alert alert-success" role="alert">
  {{ session('success_message') }}
  </div>
  @endif
    <div class="table-responsive">
                    <!-- Start kode untuk form pencarian -->
                        <form class="form" method="get" action="{{ route('comment/search') }}">
                            <div class="form-group w-100 mb-3">
                                <label for="search" class="d-block mr-2 mb-1">Cari</label>
                                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword ">
                                     <button type="submit" class="btn btn-success mb-1">Cari</button>
                            </div>
                        </form>
                    <!-- Start kode untuk form pencarian -->
                    @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                        <p>{{ $message }}</p>
                     </div>
                    @endif
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Deskripsi</th>
                            <th>Username</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key => $comment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$comment->deskripsi}}</td>
                                <td>{{$comment->users->name}}</td>
                                <td>
                                    <form class='d-inline' action="{{route('comment.destroy', $comment)}}" method="post">
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
                        Current Page : {{ $comments->currentPage() }} <br>
                        Jumlah Data : {{ $comments->total() }} <br>
                        Data perhalaman : {{ $comments->perPage() }} <br>
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
