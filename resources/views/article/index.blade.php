@extends('base')
@section('content')
    <div class="container">
        
        <h1 class="text-center">Articles</h1>
        <div class="d-flex justify-content-center ">
            <a href="{{route('articles.create')}}" class="btn btn-primary my-3"> <i class="fas fa-plus"></i> Add Article</a>
        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Créé le</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{$article->id}}</th>
                    <td>{{$article->title}}</td>
                    <td>{{$article->dateFormatted()}}</td>
                    <td class="d-flex">
                        <a class="btn btn-warning mx-3" href="{{route('articles.edit',$article->id)}}">Editer</a>
                        <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-open-{{ $article->id }}').style.display='block'">Supprimer</button>
                        <form action="{{route('articles.destroy',$article->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            {{-- Modal for article delete --}}
                            <div class="modal" id="modal-open-{{ $article->id }}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Delete article</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal-open-{{ $article->id }}').style.display='none'" >
                                      <span aria-hidden="true"></span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are sure of this procedure ?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $article->id }}').style.display='none'">Close</button>
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
            {{ $articles->links('vendor.pagination.custom') }} 
         </div>
    </div>
@endsection