<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — AksesorisShop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-logo">
            <div class="icon">💍</div>
            <h1>Daftar Akun</h1>
            <p>Bergabung dan temukan aksesori cantikmu</p>
        </div>

        @if($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label>👤 Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="Nama kamu" required>
                @error('name')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>📧 Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="contoh@email.com" required>
                @error('email')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>🔒 Password</label>
                <input type="password" name="password" placeholder="Min. 6 karakter" required>
            </div>
            <div class="form-group">
                <label>🔒 Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
            </div>
            <button type="submit" class="btn btn-pink" style="width:100%; padding:12px;">
                Daftar Sekarang 🌸
            </button>
        </form>

        <div class="auth-footer">
            Sudah punya akun? <a href="/login">Masuk di sini</a>
        </div>
    </div>
</div>
</body>
</html>