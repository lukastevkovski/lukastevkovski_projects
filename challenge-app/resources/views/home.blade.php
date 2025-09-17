<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Business Casual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://example.com/coffee-background.jpg'); /* Replace with actual coffee bean image URL */
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
            position: relative;
            min-height: 100vh;
        }
        .container {
            padding-top: 50px;
            text-align: center;
        }
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        .nav-bar {
            background-color: #4a2c2a;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .nav-bar a {
            color: #ff9900;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .content-box {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 20px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 500px;
            text-align: left;
        }
        .content-box a {
            background-color: #ff9900;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
        .promise-section {
            background-color: #f4a261;
            padding: 40px 0;
            text-align: center;
            margin-top: 20px;
        }
        .promise-box {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
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

    <div class="container">
        <h1>BUSINESS CASUAL</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="content-box">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eligendi dolorum cumque culpa ut quasi nisi accusantium esse provident impedit aspernatur rerum veritatis doloribus vero ullam, vel vitae. Tempore, amet.</p>
                    <a href="#">Visit us today</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/400x300" alt="Catalyst Cafe" class="img-fluid">
            </div>
        </div>
        <div class="promise-section">
            <div class="promise-box">
                <h2>OUR PROMISE TO YOU</h2>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab adipisci molestias ad voluptate dolores earum veniam inventore sunt quas delectus!</p>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Copyright © Your Website 2025</p>
    </div>

    <p class="text-center mt-4" style="color: white;">Welcome, {{ $firstName }} {{ $lastName }}!</p>
    <div class="text-center">
        <a href="{{ route('form') }}" class="btn btn-primary">Go to Form</a>
        <a href="{{ route('info') }}" class="btn btn-secondary">View Information</a>
        @if (session()->has('first_name') || session()->has('last_name'))
            <form action="{{ route('clear.session') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Clear Session</button>
            </form>
        @endif
    </div>
</body>
</html>