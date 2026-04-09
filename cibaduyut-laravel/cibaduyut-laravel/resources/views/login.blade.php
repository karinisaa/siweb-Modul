<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-brand">CIBADUYUT SHOES <span>•</span> ADMIN</div>

        <div class="login-card">
            <div class="login-card__hero"></div>
            <div class="login-card__content">
                <div class="login-card__icon">👟</div>
                <h1>SELAMAT DATANG</h1>
                <form method="POST" action="{{ route('login.proses') }}">
                    @csrf

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="form-group input-icon">
                        <label>USERNAME</label>
                        <span class="icon">👤</span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                               value="{{ request()->cookie('username') ?? '' }}" required>
                    </div>

                    <div class="form-group input-icon">
                        <label>PASSWORD</label>
                        <span class="icon">🔒</span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <div class="form-check remember-row">
                        <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">INGAT SAYA</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-login">Login</button>
                </form>

                <a href="{{ route('home') }}" class="back-link">← Kembali ke Beranda</a>

                <div class="login-note">
                    <strong>Demo akun:</strong>
                    <div>Username: <strong>admin</strong> / Password: <strong>123</strong></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>