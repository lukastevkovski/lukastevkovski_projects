<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form - Business Casual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('./public/cafe.jpg'); 
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            background: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 5px;
            margin-top: 50px;
        }
        .form-label {
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .nav-bar {
            background-color: #4a2c2a;
            padding: 10px 0;
            text-align: center;
        }
        .nav-bar a {
            color: #ff9900;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .footer {
            background-color: #4a2c2a;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            color: white;
        }
    </style>
</head>
<body>
    <div class="nav-bar">
        <a href="{{ route('home') }}">HOME</a>
        <a href="#">LOG IN</a>
    </div>

    <div class="container mt-5">
        <h1 style="color: white; text-align: center;">BUSINESS CASUAL</h1>
        <form action="{{ route('form.submit') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
            <a href="{{ route('home') }}" class="btn btn-secondary w-100 mt-2">Back to Home</a>
            @if (session()->has('first_name') || session()->has('last_name'))
                <form action="{{ route('clear.session') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Clear Session</button>
                </form>
            @endif
        </form>
    </div>

    <div class="footer">
        <p>Copyright © Your Website 2025</p>
    </div>
</body>
</html>