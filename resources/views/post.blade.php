@extends('base')
@section('content')
    <div class="jumbotron">
        <img src="{{asset('images/'.$post->image_path)}}" alt="post_img" class="img-thumbnail h-10 w-25">
        <h2 class="display-3 text-center">{{$post->title}}</h2>
        <div class="d-flex justify-content-center">
            <a href="{{ route('Allposts') }}" class="btn btn-primary">Retour</a>
        </div>
        <span class="badge bg-primary">{{$post->category->label}}</span>
        <span class="badge bg-info">{{$post->user->name}}</span>
        <div class="container">
            <p class="text-center">
                {!! $post->description !!}
            </p>

        </div>

        {{-- Comments section --}}
        <div class="container">
            <h1>Comments section</h1>
            @foreach ($comments as $comment)
                <p>{{$comment->body}}</p>
                <p>{{$comment->user->name}}</p>
            @endforeach
        </div>
    </div>
@endsection