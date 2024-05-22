@extends('home')

@section('content')
<center>
    <h1>Create New User</h1>
    <div class="col-md-5">
        <form action="{{url('user/create')}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control">
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-group mu-3 d-grid gap-2 d-md-flex justify-content-end mt-3">
                <button class="btn btn-warning">
                    Add User
                </button>

                <a href="{{url('/')}}" class="btn btn-primary">
                    Back
                </a>
            </div>
        </form>
    </div>
</center>
@endsection