@extends('base')
@section('content')
    @dump($errors->all())
    <div class="container">
        <h1 class="text-center">Create new article</h1>
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror " placeholder="title">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" placeholder="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="roles">Roles:</label>
                    <select name="role" class="form-control">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->label }}</option>
                            
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-12">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="d-flex justify-content-center my-4">
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
    </div>
@endsection