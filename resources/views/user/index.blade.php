@extends('base')
@section('content')
<div class="container">
    <h1 class="text-center">Users</h1>
    <div class="d-flex justify-content-center ">
        <a href="{{ route('users.create')}}" class="btn btn-primary my-3"> <i class="fas fa-plus"></i> Add User</a>
    </div>

    {{-- Users Table --}}
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Role</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            
          <tr class="">
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->label}}</td>

            {{-- edit and delete btn --}}
            <td class="d-flex">
                <a class="btn btn-warning mx-3" href="{{ route('users.edit',$user->id )}}">Editer</a>
                <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-open-{{$user->id}}').style.display='block'">Supprimer</button>
                <form action="{{ route('users.destroy',$user->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    {{-- Modal for User delete --}}
                    <div class="modal" id="modal-open-{{$user->id}}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="document.getElementById('modal-open-{{ $user->id }}').style.display='none'" >
                              <span aria-hidden="true"></span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are sure of this procedure ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $user->id }}').style.display='none'">Close</button>
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
        {{ $users->links('vendor.pagination.custom') }} 
     </div>
</div>
    
@endsection