<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — AksesorisShop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-logo">
            <div class="icon">🌸</div>
            <h1>AksesorisShop</h1>
            <p>Masuk untuk mulai berbelanja</p>
        </div>

        @if($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label>📧 Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="contoh@email.com" required autofocus>
                @error('email')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>🔒 Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="form-group" style="display:flex; align-items:center; gap:8px;">
                <input type="checkbox" name="remember" id="remember" style="width:auto; accent-color:#FF69B4;">
                <label for="remember" style="margin:0; font-weight:400; font-size:0.85rem;">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-pink" style="width:100%; padding:12px;">
                Masuk Sekarang
            </button>
        </form>

        <div class="auth-footer">
            Belum punya akun? <a href="/register">Daftar di sini</a>
        </div>

        <div class="demo-box">
            <strong>Akun Demo:</strong>
            Admin: admin@aksesoris.com / password123<br>
            User: user@aksesoris.com / password123
        </div>
    </div>
</div>
</body>
</html>