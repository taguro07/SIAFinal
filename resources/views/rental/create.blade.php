@extends('home')

@section('content')
<center>
    <h1>Create New Rent</h1>
    <div class="col-md-5 mx-auto">
        <form action="{{url('rental/create')}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="user_id"> User Id</label>
                <input type="text" name="user_id" class="form-control">
                {{-- <select name="user_id" id="user_id" class="form-select" required>
                    <option hidden = "true">Select User</option>
                    <option selected disabled> Select User</option>
                    @foreach ($users as $userId => $user )
                    <option value="{{$userId}}">{{$user}}</option>
                    @endforeach
                </select> --}}
                @error('user_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="book_id">Book Id</label>
                <input type="text" name="book_id" class="form-control">
                @error('book_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="rental_date">Rental Date</label>
                <input type="text" name="rental_date" class="form-control">
                @error('rental_date')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="return_date">Return Date</label>
                <input type="text" name="return_date" class="form-control">
                @error('return_date')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-group mu-3 d-grid gap-2 d-md-flex justify-content-end mt-3">
                <button class="btn btn-warning">
                    Add Rental
                </button>

                <a href="{{url('/')}}" class="btn btn-primary">
                    Back
                </a>
            </div>
        </form>
    </div>
</center>
@endsection