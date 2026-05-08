<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { width: 100%; max-width: 400px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-radius: 10px; background: white; }
    </style>
</head>
<body>

<div class="login-card">
    <h2 class="text-center mb-4">UTS Login</h2>
    <p class="text-center text-muted">Driver/Staff Dashboard</p>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="name@example.com" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
    </form>
    
    <div class="text-center">
        <span>Don't have an account? </span>
        <a href="{{ route('register') }}">Register here</a>
    </div>
</div>

</body>
</html>
