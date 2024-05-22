@extends('home')

@section('content')
<center>
    <h1>Create New Book</h1>
    <div class="col-md-5">
        <form action="{{url('book/create')}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control">
                @error('author')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control">
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="rental_fee">Rental Fee</label>
                <input type="text" name="rental_fee" class="form-control">
                @error('rental_fee')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-group mu-3 d-grid gap-2 d-md-flex justify-content-end mt-3">
                <button class="btn btn-warning">
                    Add Book
                </button>

                <a href="{{url('/')}}" class="btn btn-primary">
                    Back
                </a>
            </div>
        </form>
    </div>
</center>
@endsection
