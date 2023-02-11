@extends('admin.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>
            <a href="/admin/posts" class="btn btn-success"><i class='bx bx-left-arrow-alt'></i> Back to all my posts</a>
            <a href="/admin/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class='bx bxs-edit'></i> Edit</a>
            <form class='d-inline' action="/admin/posts/{{ $post->slug }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class='bx bx-x-circle'></i> Delete</button>
                </form>
            
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
        </div>
    </div>
</div>
@endsection


