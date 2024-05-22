{{-- @extends('home')

@section('content')
@if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="container mt-4">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    
    <a href="{{url('/book/create')}}" class="btn btn-primary mb-3" type="button">Add new book</button>
    <a href="{{ route('books.csv') }}" class="btn btn-primary mb-3">Download CSV</a>
    <a href="{{ route('books.import') }}" class="btn btn-secondary mb-3">Import CSV</a>
    </a>
  </div>
  <table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th>Rental Fee</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($book as $book)
        <tr>
            <td>{{$book->id }}</td>
            <td>{{$book->title }}</td>
            <td>{{$book->author }}</td>
            <td>{{$book->description }}</td>
            <td>{{$book->rental_fee }}</td>
            <td class="text-center">
                <a href="{{url('/book/'.$book->id)}}" button type="button" class="btn btn-outline-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                      </svg>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection --}}

@extends('home')

@section('content')
@if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
<div class="container mt-4">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a href="{{ url('/book/create') }}" class="btn btn-dark mb-3" type="button">Add new book</a>
        <a href="{{ route('books.csv') }}" class="btn btn-dark mb-3">Download CSV</a>
        <a href="{{ route('books.import') }}" class="btn btn-secondary mb-3">Import CSV</a>
    </div>
    <div class="row">
        @foreach($book as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $book->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><em>{{ $book->author }}</em></h6>
                        <p class="card-text">{{ $book->description }}</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <p class="card-text"><strong>Rental Fee:</strong> ${{ $book->rental_fee }}</p>
                        <a href="{{ url('/book/'.$book->id) }}" class="btn btn-outline-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg> Edit
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
