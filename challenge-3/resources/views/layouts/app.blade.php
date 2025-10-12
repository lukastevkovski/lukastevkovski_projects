<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainster Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Brainster</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="https://brainster.co/ai-at-work/">Digital Marketing</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://brainster.co/ai-at-work/">Full Stack</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://brainster.co/ai-at-work/">Front-End </a></li>
                    <li class="nav-item"><a class="nav-link" href="https://brainster.co/ai-at-work/">AI</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://brainster.co/ai-at-work/" data-bs-toggle="modal" data-bs-target="#contactModal">Contact Us!</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-center mt-4 py-3 bg-light">
        <p>Follow us on <a href="https://www.facebook.com/Brainster/" target="_blank">Facebook</a></p>
    </footer>

    @include('partials.contact-modal')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
