<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert to pdf</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>User Lists</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Qr Code</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 0; @endphp
            @foreach($users as $user)
                @if($count++ > 10)
                <div style="page-break-after: always"> &nbsp; </div>
                @php $count = 0; @endphp
                @endif
            <tr>
                <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(80)->generate($user->name )) }}" alt="QR Code"></td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>