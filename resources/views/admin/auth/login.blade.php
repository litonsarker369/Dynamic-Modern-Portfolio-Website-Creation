<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="login-body">
    <div class="login-container">
        <div class="login-card glass p-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold gradient-text">Admin Login</h2>
                <p class="text-muted">Sign in to manage your portfolio</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-gradient w-100">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
