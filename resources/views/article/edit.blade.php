@extends('base')
@section('content')

    <div class="container">
        <h1 class="text-center">Edit this article</h1>
        <form action="{{route('articles.update',$article->id)}}" method="post">
            @method("PUT")
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$article->title}}" class="form-control @error ('title') is-invalid @enderror " placeholder="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Subtitle</label>
                    <input type="text" name="subtitle" value="{{$article->subtitle}}" class="form-control @error ('subtitle') is-invalid @enderror" placeholder="subtitle">
                    @error('subtitle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="categories">Categories:</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id === $article->category->id ? 'selected' : ''}}>{{ $category->label }}</option>
                            
                        @endforeach

                    </select>

                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea id="mytextarea" name="content"  class="form-control w-100 @error ('content') is-invalid @enderror" placeholder="subtitle">
                        {{$article->content}}
                    </textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    <script>
                        tinymce.init({
                          selector: '#mytextarea'
                        });
                      </script>
                  
                </div>
            </div>
            <div class="d-flex justify-content-center my-4">
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
    </div>
@endsection