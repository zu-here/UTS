<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>UTS - University Transportation System</title>
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="display-4">Welcome to UTS</h1>
        <p class="lead">University Transportation System</p>
        <hr class="my-4">
        <div class="d-grid gap-2 d-md-block">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">Register</a>
        </div>
    </div>
</body>
</html>