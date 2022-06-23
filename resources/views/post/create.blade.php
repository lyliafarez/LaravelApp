@extends('base')
@section('content')
@dump($errors->all())
    <div class="container">
        <h1 class="text-center">Create new Post</h1>
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control @error ('title') is-invalid @enderror " placeholder="title">
                    @error('title')
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
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                            
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea id="mytextarea" name="description" class="form-control w-100 @error ('description') is-invalid @enderror" placeholder="description"></textarea>
                    @error('description')
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
            <div class="col-12">
                <input type="file" name="image" class="block placeholder-gray-400">
            </div>
            <div class="d-flex justify-content-center my-4">
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
    </div>
@endsection