@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Postingan Baru</h1>
</div>
    <div class="col-md-8">
        <form method="post" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid" @enderror id="title" autofocus value="{{ old('title') }}">
               @error('title')
              <div class="invalid-feeback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid" @enderror id="slug" value="{{ old('slug') }}">
                @error('slug')
                <div class="invalid-feeback">
                  {{ $message }}
                </div>
                @enderror
            </div>

              <div class="mb-3">
                <label for="image" class="form-label">Pilih Gambar</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror"  type="file" id="image" name="image"
                onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                <div class="invalid-feeback">
                  <p class='text-danger'>{{ $message }}</p>
                </div>
                @enderror
                <input id="body" value="Editor content goes here" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
              </div>
            <button type="submit" class="btn btn-success">Buat</button>
            <a href="{{route('posts.index')}}" class="btn btn-default">
                Batal
            </a>
          </form>
    </div>

 
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function(){
        fetch('/admin/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept',function(e){
    e.preventDefault();
    })
    function previewImage(){
     const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
      imgPreview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
       
    }
   
</script>
@endsection