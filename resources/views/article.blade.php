@extends('base')
@section('content')
    <div class="jumbotron">
        <h2 class="display-3 text-center">{{$article->title}}</h2>
        <div class="d-flex justify-content-center">
            <a href="{{ route('articles') }}" class="btn btn-primary">Retour</a>
        </div>
        <h5 class="text-center">{{$article->subtitle}}</h5>
        <span class="badge bg-primary">{{$article->category->label}}</span>
        <div class="container">
            <p class="text-center">
                {!! $article->content !!}
            </p>

        </div>
    </div>
@endsection