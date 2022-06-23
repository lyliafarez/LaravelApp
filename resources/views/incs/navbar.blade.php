<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('articles')}}">Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('Allposts')}}">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('posts.index')}}"> My Posts</a>
          </li>
         
          

          @if (Auth::user())
            @if (Auth::user()->role_id === 7)
            <li class="nav-item active">
              <a class="nav-link" href="{{route('articles.index')}}">Admin Space</a>
            </li>  
            <li class="nav-item active">
              <a class="nav-link" href="{{route('users.index')}}">Users Space</a>
            </li>  

            @endif
          <li class="nav-item ">
           <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn">Log out</button>
        </form>
          </li> 
          @else
          <li class="nav-item active">
            <a class="nav-link" href="{{route('login')}}">Log in</a>
          </li>  
          @endif
          
          
          
        </ul>
        
      </div>
    </div>
  </nav>