<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>User Information</h1>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @else
            <p><strong>First Name:</strong> {{ $firstName }}</p>
            <p><strong>Last Name:</strong> {{ $lastName }}</p>
            <p><strong>Email:</strong> {{ $email ?? 'Not provided' }}</p>
        @endif
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
        <a href="{{ route('form') }}" class="btn btn-primary">Back to Form</a>
        <form action="{{ route('clear.session') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Clear Session</button>
        </form>
    </div>
</body>
</html>