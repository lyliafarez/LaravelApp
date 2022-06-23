@extends('base')
@section('content')
    
{{-- Posts section --}}
<div class="jumbotron">
    <h1 class="display-3 text-center">
        Posts
    </h1>
    <div class="articles row justify-content-center">
        @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-body">
                        <p class="card-text">{{ $post->user->name }}</p>
                        <span>{{$post->created_at->diffForHumans()}}</span>
                        <img src="{{asset('images/'.$post->image_path)}}" alt="post_img" class="img-thumbnail h-25 w-25">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <span class="badge bg-primary">{{$post->category->label}}</span>
                        <a href="{{ route('post',$post->id)}}" class="btn btn-primary">Read</a>
                    </div>
                    <div class="row align-items-center">
                        @auth
                            @if (!$post->likedBy())
                            <form action="{{route('post.like',$post->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                            </form> 
                            @else
                            <form action="{{ route('post.unlike',$post->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link"><i class="fa fa-heart" aria-hidden="true"></i></button>
                            </form> 
                            @endif
                        @endauth
                        
                        <span>{{$post->likes->count()}} {{ Str::plural('like',$post->likes->count())}} </span>
                    </div>
                    <div class="comments">
                        <form action="{{route('post.comment',$post->id)}}" method="POST">
                            @csrf
                            <input type="text" name="body" class="form-control @error ('body') is-invalid @enderror" placeholder="comment" required>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-primary">post</button>
                        </form>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-6">
       {{ $posts->links('vendor.pagination.custom') }} 
    </div>
</div>
@endsection