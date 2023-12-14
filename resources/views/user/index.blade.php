@extends('home')

@section('content')
@if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="{{url('/user/create')}}" class="btn btn-warning me-md-2" type="button">
        Add new user
    </button>
    </a>
  </div>
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id }}</td>
            <td>{{$user->name }}</td>
            <td>{{$user->email }}</td>
            <td>{{$user->password }}</td>
            <td class="text-center">
                <a href="{{url('/user/'.$user->id)}}" button type="button" class="btn btn-outline-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                      </svg>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>




@endsection
