@extends('base')
@section('content')
<div class="jumbotron">
    <h1 class="display-3 text-center">
        Articles
    </h1>
    <div class="articles row justify-content-center">
        @foreach ($articles as $article)
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->subtitle }}</p>
                        <span class="badge bg-primary">{{$article->category->label}}</span>
                        <a href="{{ route('article',$article->slug) }}" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-6">
       {{ $articles->links('vendor.pagination.custom') }} 
    </div>
</div>
    
@endsection