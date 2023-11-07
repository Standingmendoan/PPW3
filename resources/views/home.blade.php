<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard</h1>
        <div>
            <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <!-- Tampilkan foto pengguna -->
            @if(Auth::user()->photo)
            <img src="{{ asset('images/1699347098.jpg') }}" alt="Uploaded Image" />
@else
    <p>No photo found</p>
@endif

            <a href="{{ route('upload.form') }}" class="btn btn-primary mt-3">Add Photo</a>
        </div>
    </div>
</body>
</html>
