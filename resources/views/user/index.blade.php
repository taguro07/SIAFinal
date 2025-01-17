@extends('home')

@section('content')
@if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div> 
            <a href="{{ route('scanner') }}" class="btn btn-outline-secondary btn-sm align-items-center">
                <svg id="Layer_1" data-name="Layer 1" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.61 122.88" style="width: 20px; height: 20px;">
                    <title>scan</title>
                    <path d="M23.38,0h13V11.15h-13a12.22,12.22,0,0,0-8.64,3.57l0,0a12.22,12.22,0,0,0-3.57,8.64V39.32H0V23.38A23.32,23.32,0,0,1,6.86,6.89l0,0A23.31,23.31,0,0,1,23.38,0ZM3.25,54.91H119.36a3.29,3.29,0,0,1,3.25,3.27V64.7A3.29,3.29,0,0,1,119.36,68H3.25A3.28,3.28,0,0,1,0,64.7V58.18a3.27,3.27,0,0,1,3.25-3.27ZM90.57,0h8.66a23.28,23.28,0,0,1,16.49,6.86v0a23.32,23.32,0,0,1,6.87,16.52V39.32H111.46V23.38a12.2,12.2,0,0,0-3.6-8.63v0a12.21,12.21,0,0,0-8.64-3.58H90.57V0Zm32,81.85V99.5a23.46,23.46,0,0,1-23.38,23.38H90.57V111.73h8.66A12.29,12.29,0,0,0,111.46,99.5V81.85Zm-86.23,41h-13A23.32,23.32,0,0,1,6.86,116l-.32-.35A23.28,23.28,0,0,1,0,99.5V81.85H11.15V99.5a12.25,12.25,0,0,0,3.35,8.41l.25.22a12.2,12.2,0,0,0,8.63,3.6h13v11.15Z"/>
                </svg>
            </a>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ url('/user/create') }}" style="background-color: #000; color: #fff; border-color: #000;" class="btn btn-black me-md-2 mb-2 p-2"> Add new user </a>
            <a href="users/pdf" target="_blank" style="background-color: #000; color: #fff; border-color: #000;" class="btn mb-2 p-2">Generate PDF</a>
            <a href="{{ route('users.csv') }}" style="background-color: #000; color: #fff; border-color: #000;" class="btn mb-2 p-2">Generate CSV</a>
        </div>
    </div>

    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <!-- Generate QR code with user ID and name as content -->
                        {!! QrCode::size(100)->generate($user->id . ' - ' . $user->name) !!}
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="path/to/qrcode.min.js"></script> 
<script>
    // Function to handle QR code scanning
    function handleQRScan(content) {
        // Split the content into ID and name
        var parts = content.split(' - ');
        var userId = parts[0];
        var userName = parts[1];
        alert("User ID: " + userId + "\nUser Name: " + userName); // Display the user ID and name
        // You can perform any further action with the user ID and name here
    }
</script>
@endsection
