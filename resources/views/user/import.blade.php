{{-- @extends('home')

@section('content')
<div class="container mt-4">
    <h2>Import Users from CSV</h2>
    <form action="{{ route('users.import.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Choose CSV File</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>
@endsection --}}

<form action="{{ route('user.processImportCsv') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="csv_file">
    <button type="submit">Import CSV</button>
</form>