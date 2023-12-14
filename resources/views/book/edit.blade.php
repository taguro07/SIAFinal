
@extends('home')

@section('content')
<!-- Modal -->
<center>
<div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteBookLabel">Delete book - {{$book->id}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        </div>
        <form action="{{url('book/delete/'.$book->id)}}" method="POST">
            @csrf
            @method('DELETE')
        <div class="modal-body">
          Are you sure you want to delete this book?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete Book</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@if (session('message'))
<div class="success">{{session('message')}}</div>
@endif

    <h1>
        Update Book
    </h1>
   
    <div class="row">
        <div class="col-md-5">
            
            <form action="{{url('book/'.$book->id)}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter title..." class="form-control" value="{{$book->title}}">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" placeholder="Enter author..." class="form-control" value="{{$book->author}}">
                    @error('author')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" placeholder="Enter description..." class="form-control" value="{{$book->description}}">
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="rental_fee">Rental Fee</label>
                    <input type="text" name="rental_fee" id="rental_fee" placeholder="Enter rent fee..." class="form-control" value="{{$book->rental_fee}}">
                    @error('rental_fee')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteBookModal">
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