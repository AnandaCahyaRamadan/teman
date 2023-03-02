@extends('layouts.main')
@section('content')
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
<div class="container">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
      <h5 class="fw-bold text-danger text-uppercase">Klinik Wirausaha</h5>
      <h1 class="mb-0">Baca Artikel dan Lakukan Tanya Jawab Disini</h1>
    </div>
  </div>
<div class="container mb-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>{{ $post->title }}</h3>
            <p>By. {{ $post->users->name }}</p>
          
            @if($post->image)
            <div style="max-height: 350px;overflow:hidden">
                <img src="{{ asset('storage/' . $post->image )}}" class="img-fluid mt-3">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?" class="img-fluid mt-3">
            @endif
           <article>
            <p>{!!$post->body!!}</p>
            </article>
            <a href="/klinikwirausaha/posts" class="text-decoration-none d-block mt-3 mb-5">Back to Post</a>
        
            {{-- Komentar --}}
        <form action="" method="POST" id="komentar">
            @csrf
            <div>
                <div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent" value="0">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="deskripsi" id="deskripsi"></textarea>
                        <label for="deskripsi">Komentar</label>
                      </div>
                </div>
                <button type="submit" class="btn btn-danger mt-3">Kirim</button>
            </div>
        </form>
            <div class="mt-5">
                <h1 class="mb-4 fw-bold">Komentar</h1>
                <ul class="list-unstyled activity-list">
                    <li>
                        @foreach ($post->comments()->where('parent',0)->orderBy('created_at','desc')->get() as $comment)
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="https://source.unsplash.com/50x50?" alt="avatar" class="avatar">
                                </div>
                                <div class="col-md-11">                          
                                    <p><a href=""> {{ $comment->users->name }}</a><br>
                                    {{ $comment->deskripsi}} <br><small class="text-muted" >{{ $comment->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                            <form action="" method="POST" class="ms-3">
                                @csrf
                                <div>
                                    <div>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="parent" value="{{ $comment->id }}">
                                        <input class="form-control" placeholder="Balas" name="deskripsi" id="deskripsi">
                                    </div>
                                    <button type="submit" class="btn btn-danger mt-3 btn-xs mb-4">Kirim</button>
                                </div>
                            </form>
                            @foreach ($comment->childs as $child)
                                <p><a href="" class="ms-3">{{ $child->users->name }}</a>
                                    {{ $child->deskripsi}} <br><small class="text-muted ms-3" >{{ $child->created_at->diffForHumans() }}</small>
                                </p>
                            @endforeach
                        </div>
                        
                    </li>
                    <hr>
                </ul>
                @endforeach
            </div>
    
            {{-- /KOMENTAR --}}
        </div>
    </div>
    
</div>



@endsection