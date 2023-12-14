
@extends('home')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteUserLabel">Delete User - {{$user->id}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        </div>
        <form action="{{url('user/delete/'.$user->id)}}" method="POST">
            @csrf
            @method('DELETE')
        <div class="modal-body">
          Are you sure you want to delete this user?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete User</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@if (session('message'))
<div class="success">{{session('message')}}</div>
@endif

    <h1>
        Update User
    </h1>
    <center>
    <div class="row">
        <div class="col-md-5">
            
            <form action="{{url('user/'.$user->id)}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter name..." class="form-control" value="{{$user->name}}">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter email..." class="form-control" value="{{$user->email}}">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" placeholder="Enter password..." class="form-control" value="{{$user->password}}">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                        Delete User
                      </button>
                    <button class="btn btn-primary me-md-2 mt-2">
                        Edit User
                    </button>
                </div>
            </form>
        
        </div>
    </div>
</center>

@endsection