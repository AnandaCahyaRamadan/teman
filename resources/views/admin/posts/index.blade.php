@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Postingan</h1>
  </div>
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
  {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive">
      <!-- Start kode untuk form pencarian -->
            <form class="form" method="get" action="{{ route('posts/search') }}">
                    <div class="form-group w-100 mb-3">
                            <label for="search" class="d-block mr-2 mb-1">Cari</label>
                                <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan judul atau isi">
                            <button type="submit" class="btn btn-success mb-1">Cari</button>
                     </div>
            </form>
        <!-- Start kode untuk form pencarian -->
    <a href="/admin/posts/create" class="btn btn-success mb-2">Buat Postingan Baru</a>
    <table class="table">
      <thead class="thead-dark">
        <tr class="table-light">
          <th scope="col">No.</th>
          <th scope="col">Title</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>
                <a href="/admin/posts/{{ $post->slug }}" class="badge bg-info"><i class='bx bx-low-vision'></i></a>
                <a href="/admin/posts/{{ $post->slug }}/edit" class="badge bg-warning"><i class='bx bxs-edit'></i></a>
                <form class='d-inline' action="/admin/posts/{{ $post->slug }}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class='bx bx-x-circle'></i></button>
                </form>
                
            </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection

