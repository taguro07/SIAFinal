
@extends('home')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteRentalModal" tabindex="-1" aria-labelledby="deleteRentalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteRentalLabel">Delete Rental - {{$rental->id}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        </div>
        <form action="{{url('rental/delete/'.$rental->id)}}" method="POST">
            @csrf
            @method('DELETE')
        <div class="modal-body">
          Are you sure you want to delete this rental?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete Rental</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@if (session('message'))
<div class="success">{{session('message')}}</div>
@endif

<h1>Update Rental</h1>
<center>
    <div class="row">
        <div class="col-md-5">
            
            <form action="{{url('rental/'.$rental->id)}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="user_id">User Id</label>
                    <input type="text" name="user_id" id="user_id" placeholder="Enter user id..." class="form-control" value="{{$rental->user_id}}">
                    @error('user_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="book_id">Book Id</label>
                    <input type="text" name="book_id" id="book_id" placeholder="Enter book id..." class="form-control" value="{{$rental->book_id}}">
                    @error('book_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="rental_date">Rental Date</label>
                    <input type="text" name="rental_date" id="rental_date" placeholder="Enter rental date..." class="form-control" value="{{$rental->rental_date}}">
                    @error('rental_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="return_date">Return Date</label>
                    <input type="text" name="return_date" id="return_date" placeholder="Enter return date..." class="form-control" value="{{$rental->return_date}}">
                    @error('return_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteRentalModal">
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