<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - UTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .register-card { width: 100%; max-width: 450px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-radius: 10px; background: white; }
    </style>
</head>
<body>

<div class="register-card">
    <h2 class="text-center mb-4">UTS Registration</h2>
    <p class="text-center text-muted">Create Account (Driver/Staff)</p>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="M. Hafizur Rahman" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Min 8 characters" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password" required>
        </div>
        <button type="submit" class="btn btn-success w-100 mb-3">Register</button>
    </form>
    
    <div class="text-center">
        <span>Already have an account? </span>
        <a href="{{ route('login') }}">Login here</a>
    </div>
</div>

</body>
</html>
