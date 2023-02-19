

@extends('layouts.main')
@section('careusel')
     <div class="container-fluid bg-danger py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Klinik Wirausaha</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="container">
  <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
    <h5 class="fw-bold text-danger text-uppercase">Klinik Wirausaha</h5>
    <h1 class="mb-0">Baca Artikel dan Lakukan Tanya Jawab Disini</h1>
  </div>
</div>

<div class="container mb-5 ">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-3">
        <form action="/klinikwirausaha/posts">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="search" name="search" value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit">Search</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
  @if ($posts->count())
<div class="card">
  @if($posts[0]->image)
  <div class="d-flex justify-content-center">
      <img src="{{ asset('storage/' . $posts[0]->image )}}" class="img-fluid">
  </div>
  @else
  <img src="https://source.unsplash.com/1200x400?" class="img-fluid mt-3">
  @endif
    <div class="card-body text-center">
      <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }} </a></h5>
      <p>
        <small class="text-muted">
        By. {{ $posts[0]->users->name }} - {{ $posts[0]->created_at->diffForHumans() }}
        </small>
      </p>
      <p class="card-text">{!! $posts[0]->excerpt !!}</p>
    <a href="/klinikwirausaha/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-danger">Read More</a>
    </div>
  </div>

    <div class="row mt-5 pb-3">
        @foreach($posts->skip(1) as $post)
        <div class="col-md-4">
            <div class="card">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image )}}"  class="img-fluid ">
                @else
                <img src="https://source.unsplash.com/1200x400?"  class="img-fluid">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p>
                    <small class="text-muted">
                    By. {{ $post->users->name }} - {{ $post->created_at->diffForHumans() }}
                    </small>
                  </p>
                  <p class="card-text">{!!$post->excerpt !!}</p>
                  <a href="/klinikwirausaha/posts/{{ $post->slug }}" class="text-decoration-none btn btn-danger">Read More</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
  @else
  <p class="text-center fs-4">No post found</p>
@endif
{{ $posts->links() }}
@endsection

</div>
