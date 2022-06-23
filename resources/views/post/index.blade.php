@extends('base')
@section('content')
    <div class="container">
        <h1 class="text-center">My posts</h1>
        <div class="d-flex justify-content-center ">
            <a href="{{ route('posts.create')}}" class="btn btn-primary my-3"> <i class="fas fa-plus"></i> Add Post</a>
        </div>
        @if (!$posts)
           <h1>Add a new Post</h1> 
        @else
            
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created_At</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->dateFormatted()}}</td>
                    <td>{{$post->category->label}}</td>
                    <td class="d-flex">
                        <a class="btn btn-warning mx-3" href="{{route('posts.edit',$post->id)}}">Editer</a>
                        <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-open-{{ $post->id }}').style.display='block'">Supprimer</button>
                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            {{-- Modal for article delete --}}
                            <div class="modal" id="modal-open-{{ $post->id }}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Delete article</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal-open-{{ $post->id }}').style.display='none'" >
                                      <span aria-hidden="true"></span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are sure of this procedure ?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $post->id }}').style.display='none'">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </form>
                    </td>
                  </tr>
                    
                @endforeach
              
        
            </tbody>
          </table>
          <div class="d-flex justify-content-center mt-6">
            {{-- {{ $posts->links('vendor.pagination.custom') }}  --}}
         </div>
         @endif
    </div>
    
@endsection